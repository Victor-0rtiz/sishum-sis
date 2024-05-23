<?php 
namespace Controllers;
use MVC\Router;

class DashboardController 
{
    public static function index(Router $router){
        

        if( !is_auth() ) {
            header('Location: /');

            return;
        }

        var_dump($_SESSION ) ;
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
          
           echo json_encode(['respuesta' => true]);
           return;
        }
        $router->render("dashboard/index",[]);
    }
   
    
}
