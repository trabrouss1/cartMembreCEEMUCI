<?php
    require_once('connect.ini.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title>Mes informations</title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">CEEMUCI</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                </ul>
                <!-- <form class="d-flex">
                    <a href="demande.php" type="submit" class="btn btn-secondary btn-sm">Faire ma demande den carte</a>
                </form> -->
            </div>
        </div>
    </nav>
    <h1 class="text-center text-success"> Les demandent reçu </h1>

</header>

<body>
    <section class="container">
        <div class="row my-5">
            <div class="col">
                <?php
                    $selectDemande = $bdd->query("SELECT * FROM  demande  ORDER BY id");
                    $demandes = $selectDemande->fetchAll(PDO::FETCH_OBJ);
                ?>

                <table class="table table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>LieuNaissance</th>
                            <th>DateNaissance</th>
                            <th>Poste</th>
                            <th>Contact</th>
                            <th>NiveauEtude</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ?>
                        <?php foreach($demandes as $demande) : ?>
                        <tr>
                            <td><?= $i++ ?></td>
                            <td><?= $demande->nom  ?></td>
                            <td><?= $demande->prenom  ?></td>
                            <td><?= $demande->lieu_naissance?></td>
                            <td><?= $demande->date_naissance?></td>
                            <td><?= $demande->poste ?></td>
                            <td><?= $demande->contact ?></td>
                            <td><?= $demande->niveau_etude ?></td>
                            <td width="20%">
                                <a href="supprimerPersonne.php?id=<?= $demande->id; ?>" class=" btn btn-danger
                                    btn-sm">Suprimer</a>
                                <a href="modifierDemande.php?id=<?= $demande->id; ?>"
                                    class="btn btn-success btn-sm">Modifier</a>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>

</html>