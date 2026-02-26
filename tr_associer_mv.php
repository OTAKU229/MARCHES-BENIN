<?php
include 'connexion.php';

// Récupère les valeurs envoyées par le formulaire
$idMarche = intval($_POST['idMarche']);
$idVille  = intval($_POST['idVille']);

// Requête UPDATE (la bonne pour associer)
$req = "
UPDATE marche
SET idVille = $idVille
WHERE idMarche = $idMarche
";

$result = mysqli_query($connexion, $req);

// Vérification
if (!$result) {
    die("Erreur SQL : " . mysqli_error($connexion));
}

// Redirection
header("Location: index.php");
exit;
?>