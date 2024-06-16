<?php

namespace Controllers;

use Model\DatosPersonales;
use Model\Usuario;
use MVC\Router;

class PerfilController
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
        $router->render("dashboard/Perfil/Perfil", []);
    }
    public static function ActualizarDatos(Router $router)
    {
        if (!is_auth()) {

            return;
        }
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $usuario = new DatosPersonales($_POST);

            $respuesta =   $usuario->guardar();

            if ($respuesta) {


                

                $_SESSION["Nombres"] = $usuario->Nombres ?? "usuario";
                $_SESSION["Apellidos"] = $usuario->Apellidos ?? "usuario";
                $_SESSION["login"] = true;

                $dataUser = [                
                 "Nombres" =>  $usuario->Nombres ?? "usuario",
                 "Apellidos" =>$usuario->Apellidos ?? "usuario",
                ];


                echo json_encode(["exito" => " Se acutalizaron los datos correctamente", 'Data' => $dataUser]);
                return;
            }



            echo json_encode($respuesta);
            return;
        }
    }
}
