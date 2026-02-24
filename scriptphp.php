<?php
include 'connexion.php';

if (isset($_POST['submit'])) {
    // Récupération et sécurisation des données du formulaire
    $nomMarche = mysqli_real_escape_string($connexion, trim($_POST['nomMarche']));
    $description = mysqli_real_escape_string($connexion, trim($_POST['description']));
    $capacite = mysqli_real_escape_string($connexion, $_POST['capacite']);
    $adresse = mysqli_real_escape_string($connexion, trim($_POST['adresse']));
    $telephone = mysqli_real_escape_string($connexion, trim($_POST['telephone']));
    $image = $_FILES['image']['name'];
    
    // Gestion de l'upload de l'image
    $extension = explode(".", $image);
    $vraiExtension = strtolower(end($extension));
    $tabExt = ["jpg", "jpeg", "png", "gif"];
    
    if (in_array($vraiExtension, $tabExt)) {
        $nomFichier = date("Y-m-d") . "." . date("H-i-s");
        $vraiNomFichier = $nomFichier . "." . $vraiExtension;
        $chemin = "images/" . $vraiNomFichier;
        $fichierTemp = $_FILES['image']['tmp_name'];
        move_uploaded_file($fichierTemp, $chemin);
        
        // Vérification que les champs ne sont pas vides
        if (!empty($nomMarche) && !empty($description) && !empty($capacite) && !empty($adresse) && !empty($telephone)) {
            
            // Insertion avec statut "en attente" par défaut
            $requete = "INSERT INTO marche (nomMarche, description, capacite, adresse, telephone, image)
                        VALUES ('$nomMarche', '$description', '$capacite', '$adresse', '$telephone', '$chemin')";
            $execution = mysqli_query($connexion, $requete);

            if ($execution) {
                // Redirection avec message de succès
                header("location: create.php?success=1");
                exit();
            } else {
                header("location: create.php?error=1");
                exit();
            }
        } else {
            header("location: create.php?error=1");
            exit();
        }
    } else {
        header("location: create.php?error=2"); // Extension non valide
        exit();
    }
} else {
    header("location: create.php");
    exit();
}
?>