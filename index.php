<?php
include 'connexion.php';

$req = "SELECT * FROM marche ORDER BY idMarche DESC";
$result = mysqli_query($connexion, $req);
?>

// Ceci est la page d'accueil qui affiche la liste des marchés. 

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
    </div><br>

    <div class="container mt-5">
        <h3 class="text-primary fw-bold mb-4">Liste des marchés</h3>

        <div class="row">

            <?php while($row = mysqli_fetch_assoc($result)) { ?>

                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow-sm">
                        <?php
                        $imagePath = $row['image'];
                        if (!empty($imagePath) && file_exists(__DIR__ . '/' . $imagePath)) {
                            echo '<img src="' . $imagePath . '" alt="Image marché" style="height:200px; object-fit:cover;"';
                        } else {
                            echo 'Aucune image';
                        }
                        ?>
                        <img src="<?php echo $row['image']; ?>"
                            class="card-img-top"
                            style="height:200px; object-fit:cover;">

                        <div class="card-body">
                            <h5 class="card-title fw-bold">
                                <?php echo htmlspecialchars($row['nomMarche']); ?>
                            </h5>

                            <p class="card-text">
                                <?php echo htmlspecialchars($row['description']); ?>
                            </p>

                            <p class="mb-1"><strong>Capacité :</strong>
                                <?php echo $row['capacite']; ?>
                            </p>

                            <p class="mb-1"><strong>Adresse :</strong>
                                <?php echo htmlspecialchars($row['adresse']); ?>
                            </p>

                            <p class="mb-0"><strong>Téléphone :</strong>
                                <?php echo htmlspecialchars($row['telephone']); ?>
                            </p><br>

                            <div class="d-flex justify-content-center gap-2">
                                <a href="modifier_marche.php?id=<?php echo $row['idMarche']; ?>"
                                class="btn btn-warning btn-sm">
                                    Modifier
                                </a>
                                <a href="supprimer_marche.php?id=<?php echo $row['idMarche']; ?>"
                                class="btn btn-danger btn-sm"
                                onclick="return confirm('Voulez-vous supprimer ce marché ?')">
                                    Supprimer
                                </a>
                           </div>
                        </div>

                    </div>
                </div>

            <?php } ?>

        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>