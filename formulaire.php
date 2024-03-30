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
    background-color: #6c4c35; /* Couleur de fond de la page */
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

#f {
    background-color: #6c4c35;
}

.menu-item a {
    color: #fff;
    text-decoration: none;
}

.menu-item i {
    margin-right: 10px;
}

.menu-item:hover {
    background-color: #6c4c35; /* Couleur de fond au survol */
}

.container {
    max-width: 600px;
    margin: 50px auto;
    padding: 20px;
    background-color: #f9f9f9; /* Couleur de fond du formulaire */
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h2 {
    text-align: center;
    color: #333;
}

label {
    font-weight: bold;
}

select,
input[type="text"],
input[type="date"],
input[type="email"],
textarea {
    width: 100%;
    padding: 10px; /* Augmentation de la marge intérieure */
    margin-bottom: 20px; /* Augmentation de la marge entre les champs */
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

textarea {
    height: 100px;
}

input[type="submit"] {
    background-color: #007bff; /* Couleur du bouton Soumettre */
    color: white;
    padding: 12px 24px; /* Augmentation de la marge intérieure */
    border: none;
    border-radius: 4px;
    cursor: pointer;
    width: 100%;
    font-size: 16px;
    transition: background-color 0.3s; /* Animation de transition */
}

input[type="submit"]:hover {
    background-color: #0056b3; /* Couleur au survol du bouton Soumettre */
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
    <div class="container">
        <h2>Formulaire de soumission</h2>
        <form action="traitement.php" method="post">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" placeholder="Nom" required><br>

            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" placeholder="Prenom" required><br>

            <label for="date_naissance">Date de naissance :</label>
            <input type="date" id="date_naissance" name="date_naissance"  required><br>

            <label for="cin">CIN :</label>
            <input type="text" id="cin" name="cin" placeholder="Exemple A123456 ou AB123456" required><br>

            <label for="theme">Thème :</label>
            <select id="theme" name="theme" required>
                <option value="">Choisir un thème</option>
                <option value="Science de données">Science de données</option>
                <option value="Intelligence artificielle">Intelligence artificielle</option>
                <option value="Réseaux de neurones">Réseaux de neurones</option>
                <option value="Apprentissage automatique">Apprentissage automatique</option>
                <option value="Vision par ordinateur">Vision par ordinateur</option>
                <option value="Traitement du langage naturel">Traitement du langage naturel</option>
                <option value="Robotique">Robotique</option>
                <option value="Systèmes experts">Systèmes experts</option>
                <option value="Blockchain">Blockchain</option>
                <option value="Internet des objets (IoT)">Internet des objets (IoT)</option>
                <option value="Analyse prédictive">Analyse prédictive</option>
                <option value="Cybersécurité">Cybersécurité</option>
                <option value="Bioinformatique">Bioinformatique</option>

            </select><br>

            <label for="title">title :</label>
            <input type="text" id="title" name="title" placeholder="Title" required><br>

            <label for="keywords">Mots-clés :</label>
            <input type="text" id="keywords" name="keywords" placeholder="password" required><br>

            <label for="mail">E-mail :</label>
            <input type="email" id="mail" name="mail" placeholder="exemple@gmail.com" required><br>

            <label for="phone">Téléphone :</label>
            <input type="text" id="phone" name="phone" placeholder="06XXXXXXXX" required><br>

            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required><br>

            <label for="abstract">Abstract :</label><br>
            <textarea id="abstract" name="abstract" required></textarea><br>

            <label for="supervisor_name">Superviseur :</label>
            <select id="supervisor_name" name="supervisor_name" required>
                <option value="">Choisir un superviseur</option>
                <option value="Reda Oussama">Reda Oussama</option>
                <option value="Slaoui">Slaoui</option>
                <option value="ElBenani Youssef">ElBenani Youssef</option>
                <!-- Ajoutez d'autres noms de superviseurs ici -->
            </select><br>

            <label for="mails">E-mail du superviseur :</label>
            <input type="email" id="mails" name="mails" placeholder="exemple@gmail.com" required><br>

            <!-- New Fields -->
            <label for="discipline">Discipline :</label>
            <select id="discipline" name="discipline" required>
                <option value="">Choisir une discipline</option>
                <option value="Math">Math</option>
                <option value="Info">Info</option>
                <option value="Bio">Bio</option>
                <option value="Géo">Géo</option>
                <option value="Chimie">Chimie</option>
                <option value="Physique">Physique</option>
                <!-- Ajoutez d'autres disciplines ici -->
            </select><br>

            <label for="specialite">Spécialité :</label>
            <input type="text" id="specialite" name="specialite" required><br>

            <label for="institution">Institution :</label>
           <select id="institution" name="institution" required>
    <option value="">Choisir une institution</option>
    <option value="Université A">Université A</option>
    <option value="Université B">Université B</option>
    <option value="Institut de Technologie C">Institut de Technologie C</option>
    <option value="École Supérieure D">École Supérieure D</option>
    <option value="Faculté E">Faculté E</option>
    <!-- Ajoutez d'autres institutions ici -->
</select><br>
            <!-- End of New Fields -->

            <input type="submit" value="Soumettre">
        </form>
    </div>
</body>
</html>
