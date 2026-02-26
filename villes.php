<?php
include "connexion.php";

// Récupérer toutes les courses avec le nom du chauffeur (jointure)
$requete = "SELECT c.idVille, c.nomVille
            FROM  ville c
            ORDER BY c.nomVille ASC";
$execution = mysqli_query($connexion, $requete);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Liste des Villes</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
    <div class="fixed-top mb-3">
        <?php include('menu.php'); ?>
    </div>

    <div class="container mt-5 pt-5">
        <h4 class="pt-3 mn-3 text-primary fw-bold">Liste des Villes</h4>

        <?php if (isset($_GET['delete']) && $_GET['delete'] == 1): ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                Course supprimée avec succès !
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <table class="table table-bordered table-hover mt-3">
            <thead class="table-primary">
                <tr>
                    <th>ID</th>
                    <th>Ville</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php while ($ville = mysqli_fetch_assoc($execution)): ?>
                <tr>
                    <td><?php echo $ville['idVille']; ?></td>
                    <td><?php echo htmlspecialchars($ville['nomVille']); ?></td>
                    <td>
                    <a href="modifier_ville.php?id=<?php echo $ville['idVille']; ?>"
                        class="btn btn-warning btn-sm">
                            Modifier
                    </a>
                    <a href="supprimer_ville.php?id=<?php echo $ville['idVille']; ?>"
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Voulez-vous supprimer cette ville ?')">
                            Supprimer
                    </a>
                </td>
                </tr>
                
            <?php endwhile; ?>
                       
            </tbody>
        </table>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>