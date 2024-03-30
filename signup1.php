<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page de Connexion</title>
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
        .container input[type="text"],
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
		session_start();
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			// Get form data
			$email = htmlspecialchars($_POST['email']);
			if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
				$_SESSION['error'] = "Invalid email address";
			} else {
				$nom = htmlspecialchars($_POST['nom']);
                $prenom = htmlspecialchars($_POST['prenom']);
				$password = htmlspecialchars($_POST['password']);

				// Connect to MySQL database
				$conn = mysqli_connect('localhost', 'root', '', 'doctorants');

				// Check if connection was successful
				if (!$conn) {
					die('Connection failed: ' . mysqli_connect_error());
				}

				// Prepare SQL statement to insert user into database
				$password = md5($password);
				$sql = "INSERT INTO doctorants (email, prenom,nom, password) VALUES ('$email', '$prenom','$nom', '$password')";
				$result = mysqli_query($conn, $sql);
				if (!$result) {
					// Error occurred while executing SQL statement
					$_SESSION['error'] = 'Invalid Informations.';
					// Execute SQL statement
				} else {
					if ($result) {
						$_SESSION['message'] = "User registered successfully";
					} else {
						$_SESSION['message'] = "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
				}	
				mysqli_close($conn);
			}
    // Close database connection
}
?>
    <div class="container">
    <?php
					if (isset($_SESSION['message'])) {
						echo '<p class="error-message">' . $_SESSION['message'] . '</p>';
						unset($_SESSION['message']);
					}
					if (isset($_SESSION['error'])) {
						echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
						unset($_SESSION['message']);
					}
				?>
        <h2>Sing Up</h2>
        <form method="post" class="login-form">
						<input type="email" name="email" placeholder="email">
						<input type="text" name="nom" placeholder="Nom">
                        <input type="text" name="prenom" placeholder="Prenom">
						<input type="password" name="password" placeholder="password">
						<button type="submit">SignUp</button>
						<p class="message" style="color: #e96b13 ">Do you already have an account ? <a href="signin1.php" style="color: #ccc;">LogIn</a></p>
					</form>
    </div>
    <div>
       
    </div>
</body>
</html>
