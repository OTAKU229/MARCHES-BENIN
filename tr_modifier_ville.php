<?php
include 'connexion.php';

$idVille = intval($_POST['idVille']);
$nomVille = mysqli_real_escape_string($connexion, $_POST['nomVille']);

$req = "UPDATE ville SET
        nomVille='$nomVille'
        WHERE idVille=$idVille";
        
        

mysqli_query($connexion, $req);

header("Location: liste_ville.php");
exit;