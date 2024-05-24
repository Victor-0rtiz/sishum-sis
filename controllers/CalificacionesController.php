<?php

namespace Controllers;

use Model\DetalleAnioLectivoGrado;
use MVC\Router;

class CalificacionesController
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
        $router->render("dashboard/Calificaciones/Calificaciones", []);
    }

    public static function getAllCali(Router $router)
    {
        if (!is_auth()) {
            
            return;
        }

        $detalle = DetalleAnioLectivoGrado::obtenerGradoanio();
        echo json_encode($detalle);
        return;
    }

    public static function getAllCaliAsig(Router $router)
    {
        if (!is_auth()) {
            
            return;
        }

        $detalle = DetalleAnioLectivoGrado::obtenerCalificacionAsignatura();
        echo json_encode($detalle);
        return;
    }
}
