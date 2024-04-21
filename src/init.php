<?php

require_once __DIR__ . '/loader.php';

session_start();

$database = new Database();

$database->getDb();

require_once __DIR__ . "/router.php";

?>