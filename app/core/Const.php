<?php

require_once __DIR__ . '/../../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../..');
$dotenv->load();

$urlPrimary = $_ENV['BASE_URL'];


define("BASE_URL", $urlPrimary);

?>