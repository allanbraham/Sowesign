<?php

require_once __DIR__ . '/../Services/Render.php';

class HomeController
{
    use Render;

    public function homepage() {
        require_once __DIR__.'/../Views/PageAccueil.php';
    }

    public function pageNotFound() {
        echo ('404');
    }
}

?>