<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AsignaturasController;
use Controllers\CalificacionesController;
use Controllers\DashboardController;
use Controllers\DepartamentosController;
use Controllers\DocentesController;
use Controllers\EstudiantesController;
use Controllers\LoginController;
use Controllers\MatriculasController;
use Controllers\PerfilController;
use Controllers\TutoresController;
use Controllers\UsuariosController;
use MVC\Router;
$router = new Router();
// $router->get("/", function(){
//     echo "Hola mundo";
// });

$router->get("/", [LoginController::class, "index"]);
$router->post("/login", [LoginController::class, "login"]);
$router->get("/unlogin", [LoginController::class, "deslogearse"]);



$router->get("/dashboard", [DashboardController::class, "index"]);
$router->get("/dashboard/perfil", [PerfilController::class, "index"]);
$router->get("/dashboard/matriculas", [MatriculasController::class, "index"]);
$router->get("/dashboard/calificaciones", [CalificacionesController::class, "index"]);
$router->get("/dashboard/calificaciones-asignaturas", [CalificacionesController::class, "calificacionAsignatura"]);
$router->get("/dashboard/calificaciones-notas", [CalificacionesController::class, "calificacionNotas"]);
$router->get("/dashboard/asignaturas", [AsignaturasController::class, "index"]);
$router->get("/dashboard/docentes", [DocentesController::class, "index"]);
$router->get("/dashboard/estudiantes", [EstudiantesController::class, "index"]);
$router->get("/dashboard/tutores", [TutoresController::class, "index"]);
$router->get("/dashboard/usuarios", [UsuariosController::class, "index"]);


//api

//usuarios
$router->get("/api/usuarios/all", [UsuariosController::class, "allusers"]);
$router->post("/api/usuarios/add", [UsuariosController::class, "createUser"]);
$router->get("/api/usuarios/tipouser", [UsuariosController::class, "getTipoUsers"]);


//departamentos y municipios
$router->get("/api/departamentos/all", [DepartamentosController::class, "getAllDepartamentos"]);
$router->get("/api/municipios/all", [DepartamentosController::class, "getAllMunicipios"]);


//tutores
$router->get("/api/tutores/all", [TutoresController::class, "getAllTutores"]);


//estudiantes
$router->get("/api/estudiantes/all", [EstudiantesController::class, "getAllEstudent"]);


//matricula 
$router->get("/api/matricula/all", [MatriculasController::class, "getAllMat"]);

//docentes
$router->get("/api/docentes/all", [DocentesController::class, "getAllDocentes"]);
$router->post("/api/docentes/add", [DocentesController::class, "addDocente"]);


//calificaciones
$router->get("/api/grado/calificacion/all", [CalificacionesController::class, "getAllCali"]);
$router->post("/api/calificaciones/asignaturas/all", [CalificacionesController::class, "getAllCaliAsig"]);
$router->post("/api/calificaciones/notas/all", [CalificacionesController::class, "getAllCaliNotas"]);

//asignaturas
$router->get("/api/asignaturas/all", [AsignaturasController::class, "getAllAsignaturas"]);

// sexo
$router->get("/api/sexo/all", [UsuariosController::class, "getAllsexo"]);


// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();