<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si le formulaire a été soumis
    // Traitement des données du formulaire
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $date_naissance = $_POST['date_naissance'];
    $cin = $_POST['cin'];
    $theme = $_POST['theme'];
    $keywords = $_POST['keywords'];
    $mail = $_POST['mail'];
    $phone = $_POST['phone'];
    $adresse = $_POST['adresse'];
    $abstract = $_POST['abstract'];
    $mails = $_POST['mails'];
    $supervisor_name = $_POST['supervisor_name'];
    $supervisor_mail = $_POST['mails'];
    $title = $_POST['title'];
    $discipline = $_POST['discipline'];
    $specialite = $_POST['specialite'];
    $institution = $_POST['institution'];

    // Générer le code pour le doctorant
  //  $code = generateCode($nom, $date_naissance);
    
    // Charger le fichier XML
    $xml = simplexml_load_file('soumissions.xml');

    // Vérifier si l'utilisateur a déjà soumis un formulaire
    if(isset($_SESSION['soumission_index'])) {
        // Modifier les données existantes
        $index = $_SESSION['soumission_index'];
        $soumission = $xml->soumission[$index];
        $soumission->nom = $nom;
        $soumission->prenom = $prenom;
        $soumission->date_naissance = $date_naissance;
        $soumission->cin = $cin;
        $soumission->theme = $theme;
        $soumission->keywords = $keywords;
        $soumission->mail = $mail;
        $soumission->phone = $phone;
        $soumission->adresse = $adresse;
        $soumission->abstract = $abstract;
        $soumission->title = $title;
        $supervisor = $soumission->supervisor;
        $supervisor->supervisor_name = $supervisor_name;
        $supervisor->supervisor_mail = $mails;
        $soumission->discipline = $discipline;
        $soumission->specialite = $specialite;
        $soumission->institution = $institution;
    } else {
        // Créer un nouvel élément soumission
        $soumission = $xml->addChild('soumission');
        $soumission->addChild('nom', $nom);
        $soumission->addChild('prenom', $prenom);
        $soumission->addChild('date_naissance', $date_naissance);
        $soumission->addChild('cin', $cin);
        $soumission->addChild('theme', $theme);
        $soumission->addChild('keywords', $keywords);
        $soumission->addChild('mail', $mail);
        $soumission->addChild('phone', $phone);
        $soumission->addChild('adresse', $adresse);
        $soumission->addChild('abstract', $abstract);
        $soumission->addChild('title', $title);
        $supervisor = $soumission->addChild('supervisor');
        $supervisor->addChild('supervisor_name', $supervisor_name);
        $supervisor->addChild('supervisor_mail', $mails);
        $soumission->addChild('discipline', $discipline);
        $soumission->addChild('specialite', $specialite);
        $soumission->addChild('institution', $institution);
        // Enregistrer l'index de la soumission dans la session
        $_SESSION['soumission_index'] = count($xml->soumission) - 1;
    }

    // Enregistrer les modifications dans le fichier XML
    $xmlString = $xml->asXML();
    $formattedXmlString = formatXmlString($xmlString);
    file_put_contents('soumissions.xml', $formattedXmlString);


    // Redirection vers la page de connexion après la soumission réussie
    echo '<script>window.location.replace("profil.php");</script>';
} else {
    // Si le formulaire n'a pas été soumis, afficher un message d'erreur
    echo "Ce script doit être soumis via un formulaire.";
}

// Fonction pour formater une chaîne XML
function formatXmlString($xmlString) {
    $dom = new DOMDocument();
    $dom->preserveWhiteSpace = false;
    $dom->formatOutput = true;
    $dom->loadXML($xmlString);
    return $dom->saveXML();
}


?>
