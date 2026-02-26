<?php
include 'connexion.php';

$req = "
SELECT marche.*, ville.nomVille
FROM marche
LEFT JOIN ville ON marche.idVille = ville.idVille
ORDER BY marche.idMarche DESC
";

$result = mysqli_query($connexion, $req);

// Vérification SQL (important)
if (!$result) {
    die("Erreur SQL : " . mysqli_error($connexion));
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des marchés</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

<div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
</div>

<div class="container mt-5 pt-4">
    <h3 class="text-primary fw-bold mb-4">Liste des Marchés</h3>

    <div class="row">

        <?php while($row = mysqli_fetch_assoc($result)) { ?>

            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">

                    <img src="<?php echo htmlspecialchars($row['image'] ?? ''); ?>" 
                         class="card-img-top" 
                         style="height:200px; object-fit:cover;">

                    <div class="card-body">
                        <h5 class="card-title fw-bold">
                            <?php echo htmlspecialchars($row['nomMarche'] ?? ''); ?>
                        </h5>

                        <p class="card-text">
                            <?php echo htmlspecialchars($row['description'] ?? ''); ?>
                        </p>

                        <p class="mb-1"><strong>Capacité :</strong>
                            <?php echo htmlspecialchars($row['capacite'] ?? ''); ?>
                        </p>

                        <p class="mb-1"><strong>Adresse :</strong>
                            <?php echo htmlspecialchars($row['adresse'] ?? ''); ?>
                        </p>

                        <p class="mb-1"><strong>Téléphone :</strong>
                            <?php echo htmlspecialchars($row['telephone'] ?? ''); ?>
                        </p>

                        <!-- ✅ LA LIGNE QUI TE MANQUAIT -->
                        <p class="mb-2"><strong>Ville :</strong>
                            <?php echo htmlspecialchars($row['nomVille'] ?? 'Non définie'); ?>
                        </p>

                        <a href="modifier_marche.php?id=<?= $row['idMarche']; ?>"
                           class="btn btn-primary btn-sm me-2"
                           onclick="return confirm('Voulez-vous vraiment modifier ce marché ?')">
                           Modifier
                        </a>

                        <a href="supprimer_marche.php?mode=delete&id=<?= $row['idMarche']; ?>"
                           class="btn btn-danger btn-sm"
                           onclick="return confirm('Voulez-vous vraiment supprimer ce marché ?')">
                           Supprimer
                        </a>

                    </div>
                </div>
            </div>

        <?php } ?>

    </div>
</div>

<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>