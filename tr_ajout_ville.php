<?php
include 'connexion.php';

if (isset($_POST['submit'])) {

    // Sécurisation
    $nomVille = mysqli_real_escape_string($connexion, trim($_POST['nomVille']));

    // Vérifier que le champ n'est pas vide
    if (!empty($nomVille)) {

        // Requête SQL
        $requete = "INSERT INTO ville(nomVille) VALUES('$nomVille')";
        $execution = mysqli_query($connexion, $requete);

        if ($execution) {
            header("location: ajout_ville.php?success=1");
            exit();
        } else {
            header("location: ajout_ville.php?error=1");
            exit();
        }

    } else {
        header("location: ajout_ville.php?error=2"); // champ vide
        exit();
    }

} else {
    header("location: ajout_ville.php");
    exit();
}
?>