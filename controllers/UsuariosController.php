<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class UsuariosController
{
    public static function index(Router $router)
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo json_encode(['respuesta' => true]);
            return;
        }
        $router->render("dashboard/Usuarios/Usuarios", []);
    }
    public static function allusers(Router $router)
    {

        // if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //    echo json_encode(['respuesta' => true]);
        //    return;
        // }

        $data = $_GET;
        $data = Usuario::all();
        echo json_encode($data);
        return;


        // $router->render("dashboard/Usuarios/Usuarios",[]);
    }
}
