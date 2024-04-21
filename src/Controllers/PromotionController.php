<?php

require_once __DIR__ . '/../Services/Render.php';

class PromotionController
{
    use Render;

    public function homepage()
    {
        $this->render("Promotion");
    }

    public function create()
    {
        $request = file_get_contents('php://input');

        if ($request) {
            $decodedRequest = json_decode($request);

            if ($decodedRequest) {
                $name = htmlspecialchars($decodedRequest->name);
                $surname = htmlspecialchars($decodedRequest->surname);
                $email = htmlspecialchars($decodedRequest->email);
                $mdp = htmlspecialchars($decodedRequest->mdp);
                $compte_active = htmlspecialchars($decodedRequest->compte_active);

                $utilisateurRepository = new UtilisateurRepository();
                $utilisateurRepository->create($name, $surname, $email, $mdp, $compte_active);

                include_once __DIR__ . '/../Views/API/PageAccueil.php';
            }
        }
    }
}