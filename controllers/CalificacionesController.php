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
    public static function calificacionAsignatura(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo json_encode(['respuesta' => true]);
            return;
        }
        $router->render("dashboard/Calificaciones/Calificaciones_Asignaturas", []);
    }
    public static function calificacionNotas(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            echo json_encode(['respuesta' => true]);
            return;
        }
        $router->render("dashboard/Calificaciones/Calificaciones_notas", []);
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

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $detalle = DetalleAnioLectivoGrado::obtenerCalificacionAsignatura($_POST["grado"], $_POST["turno"]);
            echo json_encode($detalle);
            return;
        }

        return;
    }
    public static function getAllCaliNotas(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas( $_POST["asignatura"]);
            echo json_encode($detalle);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }
  
}
