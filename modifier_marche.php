<?php
include 'connexion.php';

// Vérifie que l'id est bien passé
if (!isset($_GET['id'])) {
    die("ID manquant");
}

$id = intval($_GET['id']);

// Récupération des données du marché et ville
$id = intval($_GET['id']);

$req = "SELECT m.*, v.nomVille 
        FROM marche m 
        LEFT JOIN ville v ON m.idVille = v.idVille
        WHERE m.idMarche = $id";

$result = mysqli_query($connexion, $req);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Marché introuvable");
}

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
      <div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
    </div>

<div class="container mt-5 pt-5">

    <h4 class="text-primary fw-bold mb-4">Modifier le marché</h4>

    <!-- IMAGE EN HAUT -->
    <div class="text-center mb-4">
        <img src="<?= $data['image']; ?>" class="img-fluid rounded shadow" style="max-height:250px; object-fit:cover;">
    </div>

    <!-- FORMULAIRE -->
    <form action="tr_modifier_marche.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="idMarche" value="<?= $data['idMarche']; ?>">

        <div class="mb-3">
            <label class="form-label fw-bold">Nom du Marché</label>
            <input type="text" class="form-control" name="nomMarche" value="<?= htmlspecialchars($data['nomMarche']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Description</label>
            <input type="text" class="form-control" name="description" value="<?= htmlspecialchars($data['description']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Capacité</label>
            <input type="text" class="form-control" name="capacite" value="<?= $data['capacite']; ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Adresse</label>
            <input type="text" class="form-control" name="adresse" value="<?= htmlspecialchars($data['adresse']); ?>" required>
        </div>

        <div class="mb-3">
            <label class="form-label fw-bold">Téléphone</label>
            <input type="text" class="form-control" name="telephone" value="<?= htmlspecialchars($data['telephone']); ?>" required>
        </div>
        

        <div class="mb-3">
            <label class="form-label fw-bold">Changer l'image (optionnel)</label>
            <input type="file" class="form-control" name="image">
        </div>

        <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
        <a href="index.php" class="btn btn-secondary">Annuler</a>
    </form>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>