<?php 
namespace Controllers;
use MVC\Router;

class CalificacionesController 
{
    public static function index(Router $router){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
           echo json_encode(['respuesta' => true]);
           return;
        }
        $router->render("login/auth",[]);
    }
   
    
}
