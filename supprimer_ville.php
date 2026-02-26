<?php
include 'connexion.php';

// Récupération sécurisée de l'ID passé en paramètre GET
$idVille = (int) $_GET['id'];

if ($idVille > 0) {
    $request = "DELETE FROM ville WHERE idVille = $idVille";
    $execution = mysqli_query($connexion, $request);

    if ($execution) {
        header("location: liste_ville.php?delete=1");
    } else {
        header("location: liste_ville.php?error=1");
    }
} else {
    header("location: liste_ville.php");
}

?>