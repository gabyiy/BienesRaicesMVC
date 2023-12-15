<!-- Cand facem schimbari in composer trebuie sa ii facem update cu composer update -->

<?php 
//asa acesam tot ce avem in app.php (conexiune la baza de date etc)
require_once "../includes/app.php";
use  MVC\Router;
use Controllers\PropriedadController;

$router = new Router();


//punem propriedadControler pentru a cauta functia asociata acolo, iar dupa ii trecem functia respectiva
$router->get("/admin",[PropriedadController::class,"index"]);
$router->get("/propriedades/crear",[PropriedadController::class,"crear"]);
$router->post("/propriedades/crear",[PropriedadController::class,"crear"]);

$router->get("/propriedades/actualizar",[PropriedadController::class,"actualizar"]);
$router->post("/propriedades/actualizar",[PropriedadController::class,"actualizar"]);
$router->post("/propriedades/eliminar",[PropriedadController::class,"eliminar"]);




$router->comprobarRutas();
?>