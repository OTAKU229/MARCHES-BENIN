<?php
include 'connexion.php';

// Vérifie que l'id est bien passé
if (!isset($_GET['id'])) {
    die("ID manquant");
}

$id = intval($_GET['id']);

// Récupération des données du marché
$req = "SELECT * FROM ville WHERE idVille = $id";
$result = mysqli_query($connexion, $req);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    die("Ville introuvable");
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
      <div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
    </div>

<div class="container mt-5 pt-5">

    <h4 class="text-primary fw-bold mb-4">Modifier la ville</h4>

   

    <!-- FORMULAIRE -->
    <form action="tr_modifier_ville.php" method="post" enctype="multipart/form-data">

        <input type="hidden" name="idVille" value="<?= $data['idVille']; ?>">

        <div class="mb-3">
            <label class="form-label fw-bold">Nom de la ville</label>
            <input type="text" class="form-control" name="nomVille" value="<?= htmlspecialchars($data['nomVille']); ?>" required>
        </div>

        

        
        <button type="submit" class="btn btn-primary me-2">Mettre à jour</button>
        <a href="liste_ville.php" class="btn btn-secondary">Annuler</a>
    </form>

</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>