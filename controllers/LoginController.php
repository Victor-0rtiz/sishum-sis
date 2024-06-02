<?php

namespace Controllers;

use Model\DatosPersonales;
use Model\TipoUsuario;
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

                $dp = DatosPersonales::where("Id_Usuario", $usuario->Id);
                $tu = TipoUsuario::where("Id", $usuario->Id_Tipo_Usuario);
                session_start();
                $_SESSION["Id"] = $usuario->Id;
                $_SESSION["usser"] = $usuario->usser;
                $_SESSION["Id_Tipo_Usuario"] = $usuario->Id_Tipo_Usuario;
                $_SESSION["Nombres"] = $dp->Nombres ?? "usuario";
                $_SESSION["Apellidos"] = $dp->Apellidos ?? "usuario";
                $_SESSION["Rol"] = $tu->Nombre  ?? " Prueba";
                $_SESSION["login"] = true;

                $dataUser = ["Id" => $usuario->Id, 
                "usser" => $usuario->usser ,
                 "Id_Tipo_Usuario" => $usuario->Id_Tipo_Usuario,
                 "Nombres" =>  $dp->Nombres ?? "usuario",
                 "Apellidos" =>$dp->Apellidos ?? "usuario",
                 "Rol" => $tu->Nombre  ?? " Prueba"
                ];
                // header("location: /dashboard");
                echo json_encode(["resp"=> true, "data" =>$dataUser]);
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
