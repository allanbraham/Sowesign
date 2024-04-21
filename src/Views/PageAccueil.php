<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=gestion_apprenants', 'root', '');
if(isset($_POST['connexion'])){
    if(!empty($_POST['mail']) AND !empty($_POST['mdp'])){
        $mail = htmlspecialchars($_POST['mail']);
        $mdp = sha1($_POST['mdp']);

        $recupUser = $bdd->prepare('SELECT * FROM utilisateur WHERE email = ? AND mdp = ?');
        $recupUser->execute(array($mail, $mdp));
        
        if($recupUser->rowCount() > 0){
            $_SESSION['id'] = $recupUser->fetch()['id'];
            $_SESSION['mail'] = $mail;
            $_SESSION['mdp'] = $mdp;
            header('location: utilisateur.php');
        }else{
            echo "Votre email ou mot de passe est incorrect"; 
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
    <link rel="stylesheet" href="./assets/PageAccueil.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous" type="module" defer></script>
</head>

<body>
    <div>
        <nav class="navbar bg-body-tertiary">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Navbar</a>
                <a href=".//inscription.php">Inscription</a>
            </div>
        </nav>
    </div>
    <div class="d-flex justify-content-center">
        <div class="connexion">
            <form>
                <h2>Bienvenue</h2>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email *</label>
                    <input type="email" class="form-control2" id="exampleInputEmail1" placeholder="dupont@simplon.com" aria-describedby="emailHelp">
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label1">Mot de passe *</label>
                    <input type="password" class="form-control1" id="exampleInputPassword1" placeholder="******">
                </div>
                <button type="submit" class="btn btn-primary">Connexion</button>
            </form>
        </div>
    </div>
</body>

</html>