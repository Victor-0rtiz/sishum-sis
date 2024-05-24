<?php

namespace Controllers;

use Model\Estudiante;
use MVC\Router;

class EstudiantesController
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
        $router->render("dashboard/Estudiantes/Estudiantes", []);
    }
    public static function getAllEstudent(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $estudiantes =  Estudiante::obtenerEstudiantes();


        echo json_encode($estudiantes);
        return;
    }
}
