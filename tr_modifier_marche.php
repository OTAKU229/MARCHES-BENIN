<?php
include 'connexion.php';

$idMarche = intval($_POST['idMarche']);
$nomMarche = mysqli_real_escape_string($connexion, $_POST['nomMarche']);
$description = mysqli_real_escape_string($connexion, $_POST['description']);
$capacite = mysqli_real_escape_string($connexion, $_POST['capacite']);
$adresse = mysqli_real_escape_string($connexion, $_POST['adresse']);
$telephone = mysqli_real_escape_string($connexion, $_POST['telephone']);

$imageSQL = "";

/* ✅ si nouvelle image */
if (!empty($_FILES['image']['name'])) {

    $image = $_FILES['image']['name'];
    $tmp = $_FILES['image']['tmp_name'];

    $ext = strtolower(pathinfo($image, PATHINFO_EXTENSION));
    $allowed = ['jpg','jpeg','png','gif'];

    if (in_array($ext, $allowed)) {
        $newName = date("YmdHis") . "." . $ext;
        $path = "images/" . $newName;
        move_uploaded_file($tmp, $path);

        $imageSQL = ", image='$path'";
    }
}

$req = "UPDATE marche SET
        nomMarche='$nomMarche',
        description='$description',
        capacite='$capacite',
        adresse='$adresse',
        telephone='$telephone',
        $imageSQL
        WHERE idMarche=$idMarche";

mysqli_query($connexion, $req);

header("Location: index.php");
exit;