<?php

namespace Controllers;

use Model\Asignatura;
use MVC\Router;

class AsignaturasController
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
        $router->render("dashboard/Asignaturas/Asignaturas", []);
    }


    public static function getAllAsignaturas(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $detalle = Asignatura::obtenerAsingaturas();
        echo json_encode($detalle);
        return;

        return;
    }
}
