<?php 
namespace Controllers;
use MVC\Router;

class MatriculasController 
{
    public static function index(Router $router){

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
           echo json_encode(['respuesta' => true]);
           return;
        }
        $router->render("login/auth",[]);
    }
   
    
}
