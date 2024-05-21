<?php 
namespace Controllers;
use MVC\Router;

class EstudiantesController 
{
    public static function index(Router $router){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
           echo json_encode(['respuesta' => true]);
           return;
        }
        $router->render("dashboard/Estudiantes/Estudiantes",[]);
    }
   
    
}
