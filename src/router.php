<?php

$uri = $_SERVER['REQUEST_URI'];
$methode = $_SERVER['REQUEST_METHOD'];

$homeController = new HomeController();
$utilisateurController = new UtilisateurController();
$promotionController = new PromotionController();

switch ($uri) {
    case BASE_URL . "/":
        $homeController->homepage();
        break;
    case BASE_URL . "/utilisateur":
        if ($methode == 'GET') {
            $utilisateurController->homepage();
        } else if ($methode == 'POST') {
            $utilisateurController->handleFormSubmission();
        }
        break;
    case BASE_URL . "/promotion":
        if ($methode == 'GET') {
            $promotionController->homepage();
        } else if ($methode == 'POST') {
            $promotionController->create();
        }
        break;
    default:
        $homeController->pageNotFound();
        break;
}

?>
