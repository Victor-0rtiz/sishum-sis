<?php

namespace Controllers;

use Model\AnioLectivo;
use Model\Asignatura;
use Model\DetalleAnioLectivoGrado;
use Model\DetalleGradoAsignaturas;
use Model\Grado;
use Model\Turno;
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
    public static function allAniosLectivos(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $aniosLectivos = AnioLectivo::all();

        echo json_encode($aniosLectivos);
        return;
    }
    public static function allGrados(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $Grados = Grado::all();

        echo json_encode($Grados);
        return;
    }
    public static function allTurnos(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $Turnos = Turno::all();

        echo json_encode($Turnos);
        return;
    }
    public static function addAsignaturaAsignada(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $detalleAnGr = new DetalleAnioLectivoGrado($_POST);

            $resp = $detalleAnGr->guardar();

            if (!isset($resp['Id'])) {
                echo json_encode(['error' => 'No se guardo correctamente la asignación de la asignatura']);
                return;
            }

            $detalleAnGr->Id = $resp['Id'];
            // $detalleAnGr->Id = 13;

            $detalleGraAsi = new DetalleGradoAsignaturas($_POST);
            $detalleGraAsi->Id_detalle_aniolectivo_grado =  $detalleAnGr->Id;


            $resp2 = $detalleGraAsi->guardar();
            if (!isset($resp2['Id'])) {
                echo json_encode(['error' => 'No se guardo correctamente la asignación del docente a la asignatura']);
                return;
            }

            echo json_encode(['exito' => 'Se guardo correctamente la asignatura y su asignación']);
            return;
            // echo json_encode($detalleGraAsi);
            // return;
        }
    }



    public static function dellAsignaturaList(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $Asignatura = Asignatura::find($_POST["Id"]);

            $Asignatura->Estado = 0;

            $resp = $Asignatura->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }
        echo json_encode(['respuesta' => true]);
        return;
    }
    public static function dellAsignaturaUnica(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $DetalleGradoAsignaturas =  DetalleGradoAsignaturas::find($_POST["Id"]);

            $DetalleGradoAsignaturas->Estado = 0;

            $resp = $DetalleGradoAsignaturas->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }
        echo json_encode(['respuesta' => true]);
        return;
    }
}
