
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter une Ville</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>

    <div class="fixed-top mb-3">
        <?php include('menu.php'); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h4 class="pt-3 mb-3 text-primary fw-bold"> Cree une nouvelle Ville</h4>

        <?php if (isset($_GET['success'])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                Ville créée avec succès !
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
        <form action="tr_create_ville.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="nomVille" class="form-label fw-bold">Nom de la Ville</label>
                <input type="text" id="nomVille" class="form-control" name="nomVille" placeholder="Ex: Cotonou" required>
            </div>

            <div class="d-flex justify-content-between">
                <button type="submit" class="btn btn-primary" name="submit">
                    <a href="villes.php" style="color:#fff;  text-decoration: none;">Annuler</a>
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