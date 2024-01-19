<!-- Cand facem schimbari in composer trebuie sa ii facem update cu composer update -->

<?php 
//asa acesam tot ce avem in app.php (conexiune la baza de date etc)
require_once "../includes/app.php";

use Controllers\LoginController;
use  MVC\Router;
use Controllers\PropriedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;



$router = new Router();


//punem propriedadControler pentru a cauta functia asociata acolo, iar dupa ii trecem functia respectiva
$router->get("/admin",[PropriedadController::class,"index"]);
$router->get("/propriedades/crear",[PropriedadController::class,"crear"]);
$router->post("/propriedades/crear",[PropriedadController::class,"crear"]);

$router->get("/propriedades/actualizar",[PropriedadController::class,"actualizar"]);
$router->post("/propriedades/actualizar",[PropriedadController::class,"actualizar"]);
$router->post("/propriedades/eliminar",[PropriedadController::class,"eliminar"]);

$router->get("/vendedores/crear",[VendedorController::class,"crear"]);
$router->post("/vendedores/crear",[VendedorController::class,"crear"]);

$router->get("/vendedores/actualizar",[VendedorController::class,"actualizar"]);
$router->post("/vendedores/actualizar",[VendedorController::class,"actualizar"]);
$router->post("/vendedores/eliminar",[VendedorController::class,"eliminar"]);

//paginilepe care le pot vizita useri
//nu putem avea doua adrese cu acelasi nume

$router->get("/",[PaginasController::class,"index"]);
$router->get("/nosotros",[PaginasController::class,"nosotros"]);
$router->get("/propriedades",[PaginasController::class,"prorpiedades"]);
$router->get("/propriedad",[PaginasController::class,"propriedad"]);
$router->get("/blog",[PaginasController::class,"blog"]);
$router->get("/entrada",[PaginasController::class,"entrada"]);
$router->get("/contacto",[PaginasController::class,"contacto"]);
$router->post("/contacto",[PaginasController::class,"contacto"]);

//Login and autentificacion

$router->get("/login",[LoginController::class,"login"]);
$router->post("/login",[LoginController::class,"login"]);

$router->get("/logout",[LoginController::class,"logout"]);





$router->comprobarRutas();
?>