<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=gestion_apprenants', 'root', '');
if(isset($_POST['inscription'])){
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['mail']) AND !empty($_POST['mdp'])){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']);
        $insertUser = $bdd->prepare('INSERT INTO utilisateur (nom, prenom, email, mdp)VALUES(?, ?, ?, ?)');
        $insertUser->execute(array($nom, $prenom, $mail, $mdp));

        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE nom = ? AND prenom = ? AND email = ? AND mdp = ?');
        $recupUser->execute(array($nom, $prenom, $mail, $mdp));
        if($recupUser->rowCount() > 0){
            $_SESSION['id'] = $recupUser->fetch()['id'];
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;
        }
    }else{
        echo "Veuillez compléter tous les champs...";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/inscription.css">
    <script src="./script.js"></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
                <a class="navbar-brand" href="./index.php">Todolist</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="#">Inscription</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="./connexion.php">Connexion</a>
                    </li>
                </ul>
            </div>
        </div>

    </nav>

    <div class="form">
        <h1>Inscription</h1>
        <form method="POST">
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Nom :</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nom" placeholder="Dupont">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Prénom :</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="prenom" placeholder="Jean">
            </div>
            <div class="mb-3">
                <label for="exampleFormControlInput1" class="form-label">Adresse e-mail :</label>
                <input type="email" class="form-control" id="exampleFormControlInput1" name="mail" placeholder="name@example.com">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Mot de passe :</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="mdp" placeholder="********">
            </div>
            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Confirmer le mot de passe :</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="mdp" placeholder="********">
            </div>
            <button type="submit" name="inscription" class="btn btn-primary">S'inscrire</button>
        </form>
    </div>
</body>