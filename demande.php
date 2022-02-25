<?php 
// <>
session_start();
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once('connect.ini.php');
        $errors = false;
        $message = null;
    if(isset($_POST['envoyerDeamnde'])){

    if (!empty($_POST["nom"]) && !empty($_POST["prenom"]) && !empty($_POST["lieu_naissance"]) && !empty($_POST["date_naissaine"])
        && !empty($_POST["poste"]) && !empty($_POST["contact"])  &&!empty($_POST["niveau_etude"]) ) {
        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $lieuNaissance = $_POST["lieu_naissance"];
        $dateNaissaine = $_POST["date_naissaine"];
        $poste = $_POST["poste"];
        $contact = $_POST["contact"];
        $niveauEtude = $_POST["niveau_etude"];

    } else { 
        $errors = true;
        $message = "Remplissez convenablement les champs !"; 
    }
    

    if($errors == false){
        $created_at = date('Y-m-d H:i:s');
        $insertuser = $bdd->prepare("INSERT INTO demande (nom, prenom, lieu_naissance, date_naissaine, poste, contact, niveau_etude, created_at) VALUES(?,?,?,?,?,?,?,?)");
        $insertuser->execute([ $nom, $prenom, $lieuNaissance, $dateNaissaine, $poste, $contact, $niveauEtude, $created_at]);
        $_SESSION['message'] = "inscription reussir!";
        header('Location: mes-informationp.php');
    }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
    <title> <?= $title = 'Demande de carte CEEMUCI' ?> </title>
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
            </div>
        </div>
    </nav>
    <h1 class="text-center text-success"> Demande de carte </h1>

</header>

<body>

    <?= isset($message) && $message != null ? '<div class="alert text-center alert-danger">' . $message . '</div>' : '' ?>
    <div class="container my-5">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="nom" class="form-label">Nom :</label>
                        <input type="text" class="form-control"
                            value="<?= isset($_POST["nom"]) ? (htmlspecialchars($_POST['nom'])) : '' ?>" id="nom"
                            name="nom" placeholder="Votre nom">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="prenom" class="form-label">Prénom :</label>
                        <input type="text"
                            value="<?= isset($_POST["prenom"]) ? (htmlspecialchars($_POST['prenom'])) : '' ?>"
                            class="form-control" placeholder="Votre prénom" name="prenom" id="prenom">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="lieu_naissance">Lieu de naissance :</label>
                        <input type="text" class="form-control"
                            value="<?= isset($_POST["lieu_naissance"]) ? (htmlspecialchars($_POST['lieu_naissance'])) : '' ?>"
                            placeholder="Votre lieu naissance" name="lieu_naissance" id="lieu_naissance">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="date_naissaine" class="form-label">Date de naissance :</label>
                        <input type="date" class="form-control"
                            value="<?= isset($_POST["date_naissaine"]) ? (htmlspecialchars($_POST['date_naissaine'])) : '' ?>"
                            id="date_naissaine" name="date_naissaine" placeholder="Votre date de naissaine">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="niveau" class="form-label">Niveau d'etude :</label>
                        <input type="text" class="form-control"
                            value="<?= isset($_POST["niveau_etude"]) ? (htmlspecialchars($_POST['niveau_etude'])) : '' ?>"
                            placeholder="Votre niveau d'etude" name="niveau_etude" id="niveau">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="poste">Poste :</label>
                        <input type="text" class="form-control"
                            value="<?= isset($_POST["poste"]) ? (htmlspecialchars($_POST['poste'])) : '' ?>"
                            placeholder="Le poste que vous occupé" name="poste" id="poste">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="contact">Contact :</label>
                        <input type="tel" class="form-control"
                            value="<?= isset($_POST["contact"]) ? (htmlspecialchars($_POST['contact'])) : '' ?>"
                            name="contact" id="contact" placeholder="Ex.: 070501222529">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="mb-3">
                        <label for="photo_identite">Photo d'identité :</label>
                        <input type="file" class="form-control" name="photo_identite" id="photo_identite">
                    </div>
                </div>
            </div>
            <button type="submit" name="envoyerDeamnde" class="btn btn-primary">Envoyer</button>
        </form>
        <?php  require_once('includes/footer.php') ?>