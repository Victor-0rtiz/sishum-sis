<?php

namespace Controllers;

use Model\Tutor;
use MVC\Router;

class TutoresController
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
        $router->render("dashboard/Tutores/Tutores", []);
    }


    public static function getAllTutores(Router $router)
    {

        if (!is_auth()) {

            return;
        }

        $tutores = Tutor::obtenerTutores();

        echo json_encode($tutores);
        return;
    }
}
