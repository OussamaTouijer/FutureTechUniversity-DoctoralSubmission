<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil</title>
    <!-- Ajouter le lien vers Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5; /* Couleur de fond */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: 200px;
            height: 100%;
            background-color: #333;
            color: #fff;
            padding-top: 20px;
        }

        .menu-item {
            padding: 10px 20px;
            border-bottom: 1px solid #555;
            text-align: center;
        }

        .menu-item a {
            color: #fff;
            text-decoration: none;
        }

        .menu-item i {
            margin-right: 10px;
        }

        .menu-item:hover {
            background-color: #6c4c35; /* Couleur de survol */
        }

        .content {
            margin-left: 200px; /* Same as sidebar width */
            padding: 20px;
        }

        .content h1 {
            color: #333; /* Couleur du titre */
            text-align: center;
            margin-bottom: 20px; /* Marge inférieure */
        }

        .info-container {
            background-color: #fff; /* Couleur de fond du conteneur */
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
        }

        .info-container p {
            color: #555; /* Couleur du texte */
            margin-bottom: 10px; /* Marge inférieure entre les éléments */
        }
    </style>
</head>
<body>
<?php
session_start();
if(!isset($_SESSION['doctorant_nom'])){header("Location: signin1.php");}
?>
<div class="sidebar">
    <!-- Ajouter des icônes aux éléments de menu -->
    <div class="menu-item"><i class="fas fa-user"></i><a href="profil.php"><?php echo $_SESSION['doctorant_nom']. " ".$_SESSION['doctorant_prenom'] ?></a></div>
    <div class="menu-item"><i class="fas fa-pencil-alt"></i><a href="formulaire.php">Formulaire de Soumission</a></div>
    <div class="menu-item"><i class="fas fa-sign-out-alt"></i><a href="signout1.php">Se déconnecter</a></div>
</div>
<div class="content">
    <!-- Contenu de la page ici -->
    <h1>Profil de l'utilisateur</h1>
    <div class="info-container">
        <p><strong>Nom:</strong> <?php echo $_SESSION['doctorant_nom']; ?></p>
        <p><strong>Prénom:</strong> <?php echo $_SESSION['doctorant_prenom']; ?></p>
    </div>
</div>
</body>
</html>
