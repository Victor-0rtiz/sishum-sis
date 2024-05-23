<?php

namespace Controllers;

use Model\Usuario;
use Model\TipoUsuario;
use MVC\Router;

class UsuariosController
{
    public static function index(Router $router)
    {

        if (!is_auth()) {
            header('Location: /');
            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo json_encode(['respuesta' => true]);
            return;
        }
        $router->render("dashboard/Usuarios/Usuarios", []);
    }

    public static function createUser(Router $router)
    {
        $alertas = [];
        if (!is_auth()) {

            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $newuser = new Usuario($_POST);

            // echo json_encode($_POST);
            // return;



            $alertas =  $newuser->validarCreacion();


            if (!empty($alertas)) {
                echo json_encode($alertas);
                return;
            }

            $usuario = Usuario::where("usser", $newuser->usser);

            if ($usuario) {
                echo json_encode(["error" => ["Usuario ya existe "]]);
                return;
            }

            $newuser->password = password_hash($newuser->usser, PASSWORD_BCRYPT); 

            echo json_encode(['respuesta' => $newuser]);
            return;
        }
    }


    public static function allusers(Router $router)
    {

        // $data = $_GET;
        // $data = Usuario::all();

        $data = Usuario::obtenerUsuarios();
        echo json_encode($data);
        return;
    }
    public static function getTipoUsers(Router $router)
    {

        // $data = $_GET;
        $data = TipoUsuario::all();

        // $data = Usuario::obtenerUsuarios();
        echo json_encode($data);
        return;
    }
    // public static function addUsers(Router $router)
    // {

    //     // $data = $_GET;
    //     $data = TipoUsuario::all();

    //     // $data = Usuario::obtenerUsuarios();
    //     echo json_encode($data);
    //     return;
    // }
}
