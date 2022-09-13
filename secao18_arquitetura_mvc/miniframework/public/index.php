<?php 
//php -S localhost:8080
//https://getcomposer.org/download/
//Composer.json -> autoload -> psr-4 -> App\\ -> Definir um namespace para usar todos os arquivos da App sem ficar dando require

require_once("../vendor/autoload.php");

$route = new \App\Route;

?>