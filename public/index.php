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
$router->get("/dashboard/perfil", [PerfilController::class, "index"]);
$router->get("/dashboard/matriculas", [MatriculasController::class, "index"]);
$router->get("/dashboard/calificaciones", [CalificacionesController::class, "index"]);
$router->get("/dashboard/asignaturas", [AsignaturasController::class, "index"]);
$router->get("/dashboard/docentes", [DocentesController::class, "index"]);




// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();