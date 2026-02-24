<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Ajouter un marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
    <?php include('menu.php'); ?>
    </div>

    <div class="container mt-5 pt-5">
    <h4 class="pt-3 mb-3 text-primary fw-bold">Ajouter un nouveau marché</h4>

    <!-- Alerte de succès -->
    <?php if (isset($_GET['success'])): ?>
    <div class="alert alert-success alert-dismissible fade show">
    Marché ajoutée avec succès !
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Alerte d'erreur -->
    <?php if (isset($_GET['error'])): ?>
    <div class="alert alert-danger alert-dismissible fade show">
    Une erreur est survenue. Veuillez reessayer.
    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
    </div>
    <?php endif; ?>

    <!-- Formulaire d'ajout -->
    <form action="scriptphp.php" method="post" enctype="multipart/form-data">
    <div class="mb-3">
    <label class="form-label fw-bold">Nom du Marché</label>
    <input type="text" class="form-control" name="nomMarche" placeholder="Ex: Cotonou" required>
    </div>
    <div class="mb-3">
    <label class="form-label fw-bold">Descritpion</label>
    <input type="text" class="form-control" name="description" placeholder="Ex: Nom du groupe" required>
    </div>
    <div class="mb-3">
    <label class="form-label fw-bold">Capacite du marché</label>
    <input type="text" class="form-control" name="capacite" placeholder="Capacité du marché/ Nombre de places" required>
    </div>
    
    <div class="mb-3">
    <label class="form-label fw-bold">Adresse du marché</label>
    <input type="text" class="form-control" name="adresse" placeholder="Adresse" required>
    </div>

    <div class="mb-3">
    <label class="form-label fw-bold">Téléphone </label>
    <input type="text" class="form-control" name="telephone" placeholder="Téléphone" required>
    </div>

    <div class="mb-3">
    <label class="form-label fw-bold">Image</label>
    <input type="file" class="form-control" name="image" required>
    </div>
    <button type="submit" class="btn btn-primary" name="submit">Enregister</button>
     <button type="button" class="btn btn-secondary" onclick="window.location.href='create.php'">Annulé</button>
    </form>
    </div>
</body>