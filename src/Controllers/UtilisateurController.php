<?php

require_once __DIR__ . '/../Services/Render.php';

class UtilisateurController
{
    use Render;
    public function homepage()
    {
        $this->render("Utilisateur");
    }

    public function handleFormSubmission()
    {
        if (
            !empty($_POST) &&
            isset(
                $_POST['nom'],
                $_POST['prenom'],
                $_POST['email'],
                $_POST['mdp'],
                $_POST['compte_active']
            )
        ) {
            $name = htmlspecialchars($_POST['nom']);
            $surname = htmlspecialchars($_POST['prenom']);
            $email = htmlspecialchars($_POST['email']);
            $mdp = sha1($_POST['mdp']);
            $compte_active = htmlspecialchars($_POST['compte_active']);

            $utilisateurRepository = new UtilisateurRepository();
            $utilisateurRepository->create($name, $surname, $email, $mdp, $compte_active);

            header('location:' . BASE_URL . '/utilisateur');
        }
    }
}

?>