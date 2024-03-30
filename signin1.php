<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #333;
        }
        .container {
            width: 300px;
            margin: 0 auto;
            margin-top: 50px;
            border: 1px solid #e96b13;
            padding: 20px;
            border-radius: 5px;
        }
        .container h2 {
            text-align: center;
            color: #e96b13;
        }
        
        .container input[type="email"],
        .container input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            margin-bottom: 20px;
            border: 1px solid #e96b13;
            border-radius: 3px;
            box-sizing: border-box;
        }
        .container input[type="submit"] {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 3px;
            cursor: pointer;
        }
        .container input[type="submit"]:hover {
            background-color: #e96b13;
        }
    </style>
</head>
<body>
<?php

// Start session
session_start();
// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get username and password from form
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Connect to MySQL database
    $conn = mysqli_connect('localhost', 'root', '', 'doctorants');

    // Check if connection was successful
    if (!$conn) {
        die('Connection failed: ' . mysqli_connect_error());
    }

    // Prepare SQL statement to select user from database
    $password = md5($password);

    $sql = "SELECT email,prenom,nom FROM doctorants WHERE email = '$email' AND password = '$password'";

    // Execute SQL statement
    $result = mysqli_query($conn, $sql);
    if (!$result) {
        // Error occurred while executing SQL statement
        $_SESSION['error'] = 'Invalid username or password.';
    }else {
        // Check if user was found in database
        if (mysqli_num_rows($result) === 1) {
            // User is authenticated, set session variables
            $doctorant = mysqli_fetch_assoc($result);
            $_SESSION['doctorant_email'] = $doctorant['email'];
            $_SESSION['doctorant_prenom'] = $doctorant['prenom'];
            $_SESSION['doctorant_nom'] = $doctorant['nom'];
            
                header('Location: profil.php');
            
        } else {
            // Authentication failed, display error message
            $_SESSION['error'] = 'Invalid username or password.';
        }
    }
    // Close database connection
    mysqli_close($conn);	
}
?>
    <div class="container">
        <h2>Sing In</h2>
        <form method="post" class="login-form">
						<input type="email" name="email" placeholder="email">
						<input type="password" name="password" placeholder="password">
						<button type="submit">Sing In</button>
						<p class="message" style="color: #e96b13;">Create a new account ! <a href="signup1.php" style="color: #ccc;">SingUp</a></p>
					</form>
    </div>
</body>
</html>
