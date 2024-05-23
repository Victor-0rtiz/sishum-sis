<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function index(Router $router)
    {
        $router->render("login/auth", []);
    }
    public static function login(Router $router)
    {
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auth = new Usuario($_POST);

            $alertas =  $auth->validarLogin();


            if (!empty($alertas)) {
                echo json_encode($alertas);
                return;
            }

            $usuario = Usuario::where("usser", $auth->usser);

            if (!$usuario) {
                echo json_encode(["error" => ["Usuario incorrecto o no existe"]]);
                return;
            }

            if (password_verify($auth->password, $usuario->password)) {
                session_start();
                $_SESSION["Id"] = $usuario->Id;
                $_SESSION["usser"] = $usuario->usser;
                $_SESSION["login"] = true;
                // header("location: /dashboard");
                echo json_encode(true);
                return;
            } else {
                echo json_encode(["error" => ["Contraseña incorrecta"]]);
                return;
            }
        }
    }

    public static function deslogearse(Router $router)
    {
     session_start();
     $_SESSION = [];
     session_destroy();
     header('Location: /');
    }
}
