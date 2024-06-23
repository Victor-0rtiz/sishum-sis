<?php

namespace Controllers;

use Model\DetalleGradoAsignaturas;
use Model\AnioLectivo;
use Model\Asignatura;
use Model\DetalleAnioLectivoGrado;
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
    public static function editAsignaturas(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            // echo json_encode($_POST);
            // return;
            $asinatura =  Asignatura::find($_POST["Id"]);

            $asinatura->sincronizar($_POST);
            $resp = $asinatura->guardar();

            if ($resp) {
                echo json_encode(['exito' => 'Se edito correctamente la asignatura']);
                return;
            }
            echo json_encode(['error' => 'No se edito correctamente la asignatura']);
            return;
        }
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

    public static function editAsignaturaAsignada(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // echo json_encode($_POST);
            // return;


            $detalleAnGrEdits =  DetalleGradoAsignaturas::find($_POST['Id']);
            $detalleAnGrEdits->sincronizar([
                'Id_detalle_aniolectivo_grado' => $_POST['Id_detalle_aniolectivo_grado'],
                'Id_asignatura' => $_POST['Id_asignatura'],
                'Id_docente' => $_POST['Id_docente'],
            ]);
            $detalleAnGrData =  DetalleGradoAsignaturas::find($_POST["Id"]);


            if ($detalleAnGrData != $detalleAnGrEdits) {

                $detalleAnGrexistentes =  DetalleGradoAsignaturas::whereArray([
                    'Id_detalle_aniolectivo_grado' => $_POST['Id_detalle_aniolectivo_grado'],
                    'Id_asignatura' => $_POST['Id_asignatura'],
                    'Id_docente' => $_POST['Id_docente'],
                ]);
                // echo json_encode($detalleAnGrexistentes);
                // return;
                if ($detalleAnGrexistentes) {
                    echo json_encode(['alert' => 'Ya existe un registro de la asignatura asignada al docente en ese año y grado con esos datos']);
                    return;
                }
            }

            $detallenAniolecEdit =  DetalleAnioLectivoGrado::find($_POST['Id_detalle_aniolectivo_grado']);
            $detallenAniolecEdit->sincronizar([
                'Id_anio_lectivo' => $_POST['Id_anio_lectivo'],
                'id_turno' => $_POST['id_turno'],
                'id_grado' => $_POST['id_grado'],
            ]);
            $detalleAnioLecData =  DetalleAnioLectivoGrado::find($_POST["Id_detalle_aniolectivo_grado"]);


            if ($detalleAnioLecData != $detallenAniolecEdit) {

                $detalleAnGrexistente =  DetalleAnioLectivoGrado::whereArray([
                    'Id_anio_lectivo' => $_POST['Id_anio_lectivo'],
                    'id_turno' => $_POST['id_turno'],
                    'id_grado' => $_POST['id_grado'],
                ]);

                if ($detalleAnGrexistente) {
                    echo json_encode(['alert' => 'Ya existe un registro de ese grado y año lectivo con esos datos']);
                    return;
                }
            }


            
            $resps =   $detalleAnGrEdits->guardar();
            $resps2 =  $detallenAniolecEdit->guardar();


         

            if ($resps) {
                echo json_encode(['exito' => 'Se actualizaron correctamente los datos']);
                return;
                
            }

            echo json_encode(['error' => 'Ocurrio un error al actualizar los datos']);
                return;

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
