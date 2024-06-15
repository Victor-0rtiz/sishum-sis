<?php

namespace Controllers;

use Model\DetalleAnioLectivoGrado;
use Model\DetalleGradoAsignaturas;
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

            $detalle = DetalleAnioLectivoGrado::obtenerCalificacionAsignatura($_POST["iddag"]);
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



            $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas($_POST["dga"]);
            echo json_encode($detalle);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }
    public static function addDetalleGradAnioAsig(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            $dataGradoAnioTurn = DetalleAnioLectivoGrado::whereArray($_POST);

            if ($dataGradoAnioTurn) {

                echo json_encode(["alert" => "El registro existe, verifique los datos"]);
                return;
            }


            $GradoAnioTurn = new DetalleAnioLectivoGrado($_POST);

            $resp =  $GradoAnioTurn->guardar();

            if (isset($resp["Id"])) {
                echo json_encode(["exito" => "Se guardaron correctamente las asignaciónes "]);
                return;
            }





            echo json_encode($dataGradoAnioTurn);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }
    public static function addDetalleGradoAsig(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            $dataGradoAsignatura = DetalleGradoAsignaturas::whereArray($_POST);

            if ($dataGradoAsignatura) {

                echo json_encode(["alert" => "El registro existe, verifique los datos"]);
                return;
            }


            $dataExistenciaAsignatura = DetalleGradoAsignaturas::whereArray(['Id_asignatura'=> $_POST['Id_asignatura'], 'Id_detalle_aniolectivo_grado'=> $_POST['Id_detalle_aniolectivo_grado' ]]);

            if ($dataExistenciaAsignatura) {

                echo json_encode(["alert" => "El registro de la asignatura al grado ya existe, verifique los datos"]);
                return;
            }

           
            $GradoAsignatura = new DetalleGradoAsignaturas($_POST);

            $resp =  $GradoAsignatura->guardar();

            if (isset($resp["Id"])) {
                echo json_encode(["exito" => "Se guardo correctamente las asignación de la asignatura "]);
                return;
            }

            echo json_encode($resp);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }
}
