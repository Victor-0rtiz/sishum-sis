<?php 
namespace Controllers;
use MVC\Router;

class AsignaturasController 
{
    public static function index(Router $router){
        if( !is_auth() ) {
            header('Location: /');
            return;
        }

        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
           echo json_encode(['respuesta' => true]);
           return;
        }
        $router->render("dashboard/Asignaturas/Asignaturas",[]);
    }
   
    
}
