<?php

namespace Controllers;

use Model\Usuario;
use MVC\Router;

class LoginController
{
    public static function index(Router $router)
    {

        // if($_SERVER['REQUEST_METHOD'] == 'POST') {

        //    echo json_encode(['respuesta' => true]);
        //    return;
        // }
        $router->render("login/auth", []);
    }
    public static function login(Router $router)
    {
        $alertas = [];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $auth = new Usuario($_POST);

            $alertas =  $auth->validarLogin();


            if (empty($alertas)) {
                $usuario = Usuario::where("usser", $auth->usser);
                if (!$usuario) {
                    Usuario::setAlerta("error", "El usuario no existe o no esta confirmado");
                } else {
                    if (password_verify($auth->password, $usuario->password)) {
                        session_start();
                        $_SESSION["id"] = $usuario->Id;
                        $_SESSION["nombre"] = $usuario->usser;
                        $_SESSION["login"] = true;
                        // header("location: /dashboard");
                        echo json_encode(['respuesta' => $_POST]);
                        return;
                    } else {
                        Usuario::setAlerta("error", "Contraseña incorrecta");
                    }
                }
            }
            echo json_encode(['respuesta' => $_POST]);
            return;
        }
    }
}
