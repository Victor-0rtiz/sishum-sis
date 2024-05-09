<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AsignaturasController;
use Controllers\CalificacionesController;
use Controllers\DashboardController;
use Controllers\DocentesController;
use Controllers\LoginController;
use Controllers\MatriculasController;
use Controllers\PerfilController;
use MVC\Router;
$router = new Router();
// $router->get("/", function(){
//     echo "Hola mundo";
// });

$router->get("/", [LoginController::class, "index"]);
$router->post("/login", [LoginController::class, "index"]);



$router->get("/dashboard", [DashboardController::class, "index"]);
$router->get("/perfil", [PerfilController::class, "index"]);
$router->get("/matriculas", [MatriculasController::class, "index"]);
$router->get("/calificaciones", [CalificacionesController::class, "index"]);
$router->get("/asignaturas", [AsignaturasController::class, "index"]);
$router->get("/docentes", [DocentesController::class, "index"]);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();