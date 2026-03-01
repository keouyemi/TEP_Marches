
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un nouveau marché</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="fixed-top mb-3">
        <?php include('menu.php'); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h4 class="pt-3 mb-3 text-primary fw-bold"> Crée un nouveau marché</h4>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Marché créer avec succès !
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_GET['error'])): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                Une erreur est survenue. Veuillez réessayer.
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Formulaire d'ajout -->
        <form action="tr_create_marche.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomMarche" class="form-label fw-bold">Nom du Marché</label>
                <input type="text" id="nomMarche" class="form-control" name="nomMarche" placeholder="Ex: Marché de Cotonou" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label fw-bold">Description</label>
                <input type="text" id="description" class="form-control" name="description" placeholder="Ex: Marché de Cotonou" required>
            </div>
            <div class="mb-3">
                <label for="capacite" class="form-label fw-bold">Capacité du marché</label>
                <input type="number" id="capacite" class="form-control" name="capacite"  required>
            </div>

            <div class="mb-3">
                <label for="adresse" class="form-label fw-bold">Adresse</label>
                <input type="text" id="adresse" class="form-control" name="adresse"  required>
            </div>

            <div class="mb-3">
                <label for="telephone" class="form-label fw-bold">Téléphone</label>
                <input type="number" id="telephone" class="form-control" name="telephone"  required>
            </div>

            <div class="mb-3">
                <label for="image" class="form-label fw-bold">Image</label>
                <input type="file" id="image" class="form-control" name="image"  required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submit">
                    Annuler
                </button>
                <button type="submit" class="btn btn-success" name="submit">
                    Enregistrer
                </button>
            </div>

            
        </form>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>