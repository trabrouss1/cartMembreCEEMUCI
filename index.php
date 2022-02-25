<?php 
// <>
error_reporting(E_ALL);
ini_set("display_errors", 1);
    require_once('connect.ini.php');


    if(isset($_POST['envoyer'])){
        if(!empty('email') && !empty('password')){
            $email = htmlspecialchars($_POST['email']);
            $password =  password_hash($_POST['password'], PASSWORD_ARGON2I);

            var_dump($email, $password);
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
    <title> <?= isset($title) ? $title : 'Bienvenu sur le site des carte CEEMUCI' ?> </title>
</head>

<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">CEEMUCI</a>
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
                <form class="d-flex">
                    <a href="demande.php" type="submit" class="btn btn-secondary btn-sm">Faire ma demande den carte</a>
                </form>
            </div>
        </div>
    </nav>
    <h1 class="text-center text-success"> Page des administrateurs </h1>

</header>

<body>

    <section class="container">
        <div class="row">
            <div class="col my-4">
                <form action="" method="POST">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control" placeholder="Entrez votre email"
                            id="exampleInputEmail1" name="email" aria-describedby="emailHelp" autofocus>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Mot de passe</label>
                        <input type="password" class="form-control" autocomplete="current-password"
                            placeholder="Entrez votre mot de passe" name="password" id="exampleInputPassword1">
                    </div>
                    <div class="">
                        <button type="submit" name="envoyer" class="btn btn-primary btn-sm">Se connecter</button>
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php  require_once('includes/footer.php') ?>