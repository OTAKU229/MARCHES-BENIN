<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajouter une ville dans un marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
    </div>
    
    <div class="container mt-5 pt-5">
        <h4 class="text-primary fw-bold mb-3">
        Associer un marché à une ville
    </h4>

    <form action="tr_associer_mv.php" method="post">

        <!-- Choix du marché -->
        <div class="mb-3">
            <label class="form-label fw-bold">Choisir le marché</label>
            <select name="idMarche" class="form-control" required>
                <option value="">-- Sélectionner --</option>

                <?php
                include 'connexion.php';
                $marche = mysqli_query($connexion, "SELECT * FROM marche");

                while ($m = mysqli_fetch_assoc($marche)) {
                    echo "<option value='".$m['idMarche']."'>".$m['nomMarche']."</option>";
                }
                ?>
            </select>
        </div>

        <!-- Choix de la ville -->
        <div class="mb-3">
            <label class="form-label fw-bold">Choisir la ville</label>
            <select name="idVille" class="form-control" required>
                <option value="">-- Sélectionner --</option>

                <?php
                $ville = mysqli_query($connexion, "SELECT * FROM ville");

                while ($v = mysqli_fetch_assoc($ville)) {
                    echo "<option value='".$v['idVille']."'>".$v['nomVille']."</option>";
                }
                ?>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">
            Enregistrer
        </button>
    </form>
    </div>
    

</body>
</html>
