<?php

namespace Controllers;

use Model\Matricula;
use MVC\Router;

class MatriculasController
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
        $router->render("dashboard/Matriculas/Matriculas", []);
    }
    public static function getAllMat(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $matriculas = Matricula::obtenerMatriculas();


        echo json_encode($matriculas);
        return;
    }
    public static function addMatricula(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo json_encode($_POST);
            return;
        }
        echo json_encode("false");
        return;
    }
}
