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
    public static function getAsignaturasList(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $detalle = Asignatura::all();
        echo json_encode($detalle);
        return;

        return;
    }
    public static function addAsignaturas(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $asinatura = new Asignatura($_POST);

            $resp = $asinatura->guardar();

            if (isset($resp['Id'])) {
                echo json_encode(['exito' => 'Se guardo correctamente la asignatura']);
                return;
            }
            echo json_encode(['error' => 'No se guardo correctamente la asignatura']);
            return;
        }
    }
}
