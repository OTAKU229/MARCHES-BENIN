<?php
include "connexion.php";

// Récupérer toutes les courses avec le nom du chauffeur + image
$requete = "SELECT * FROM ville";
   


$execution = mysqli_query($connexion, $requete);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>MARCHES BENIN -Liste Ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>

<body>

<div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
</div>

<div class="container mt-5 pt-5">
    <div class="pt-3 mb-3 text-primary fw-bold">
        Liste de toutes les villes
    </div>

    <table class="table table-bordered table-hover mt-3">
        <thead class="table-primary">
            <tr>
                <th>idVille</th>
                <th>Nom de la ville</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>

        <?php while ($ville = mysqli_fetch_assoc($execution)): ?>
            <tr>
                <td><?= $ville['idVille']; ?></td>
                <td><?= htmlspecialchars($ville['nomVille']); ?></td>

                <td>
                   
                    <a href="modifier_ville.php?id=<?= $ville['idVille'];   ?>"
                             class="btn btn-primary btn-sm me-5"
                             onclick="return confirm('Voulez-vous vraiment modifier cette ville ?')">
                             Modifier
                        </a>
                       <a href="supprimer_ville.php?mode=delete&id=<?= $ville['idVille']; ?>"
                            class="btn btn-danger btn-sm me-5"
                            onclick="return confirm('Voulez-vous vraiment supprimer cette ville ?')">
                            Supprimer
                        </a>
                        <a href="ajout_ville_marche.php?mode=delete&id=<?= $ville['idVille']; ?>"
                            class="btn btn-success btn-sm"
                            >
                            Ajout ville dans un marché
                        </a>
                </td>
            </tr>
        <?php endwhile; ?>

        </tbody>
    </table>
</div>

</body>
</html>