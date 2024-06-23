<?php

namespace Controllers;

use Model\DetalleAnioLectivoGrado;
use Model\DetalleGradoAsignaturas;
use Model\DetalleNotaAsignatura;
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

    public static function editDetalleGradAnioAsig(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            $dataGradoAnioTurnData = DetalleAnioLectivoGrado::where("Id", $_POST["Id"]);
            $dataGradoAnioTurnModificado = DetalleAnioLectivoGrado::where("Id", $_POST["Id"]);
            $dataGradoAnioTurnModificado->sincronizar($_POST);


            if ($dataGradoAnioTurnData != $dataGradoAnioTurnModificado) {

                $dataGradoAnioTurnDataExistente = DetalleAnioLectivoGrado::whereArray([
                    'Id_anio_lectivo',
                    'id_grado',
                    'id_turno',
                ]);

                if ($dataGradoAnioTurnDataExistente) {
                    echo json_encode(["alert" => "La matricula ya existe, verifique los datos"]);
                    return;
                }
            }




            $resp =  $dataGradoAnioTurnModificado->guardar();

            if ($resp) {
                echo json_encode(["exito" => "Se guardaron correctamente las asignaciónes "]);
                return;
            }
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


            $dataExistenciaAsignatura = DetalleGradoAsignaturas::whereArray(['Id_asignatura' => $_POST['Id_asignatura'], 'Id_detalle_aniolectivo_grado' => $_POST['Id_detalle_aniolectivo_grado']]);

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

    public static function editDetalleGradoAsig(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $dataGradoAsignaturaEdit = DetalleGradoAsignaturas::where("Id", $_POST["Id"]);
            $dataGradoAsignaturaOriginal = DetalleGradoAsignaturas::where("Id", $_POST["Id"]);
            $dataGradoAsignaturaEdit->sincronizar($_POST);



            if ($dataGradoAsignaturaEdit != $dataGradoAsignaturaOriginal) {

                $dataGradoAnioTurnDataExistente = DetalleGradoAsignaturas::whereArray([
                    'Id_detalle_aniolectivo_grado',
                    'Id_asignatura',
                    'Id_docente',
                ]);

                if ($dataGradoAnioTurnDataExistente) {
                    echo json_encode(["alert" => "La Asignatura en este grado ya tiene un docente asignado, verifique los datos"]);
                    return;
                }
            }

            $resp = $dataGradoAsignaturaEdit->guardar();





            if ($resp) {
                echo json_encode(["exito" => "Se edito correctamente las asignación de la asignatura "]);
                return;
            }

            echo json_encode($resp);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }

    public static function addCaliNotas(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            $detalle = DetalleNotaAsignatura::whereArray(['id_matricula' => $_POST['id_matricula'], 'id_detalle_grado_asignatura' => $_POST['id_detalle_grado_asignatura']]);

           
            if ($detalle) {

                echo json_encode(["alert" => "El registro existe, verifique los datos"]);
                return;
            }

        

            $notaNew = new DetalleNotaAsignatura($_POST);

            $resp =  $notaNew->guardar();

            if (isset($resp["Id"])) {
                echo json_encode(["exito" => "Se guardo correctamente las asignación de la asignatura "]);
                return;
            }




            echo json_encode($_POST);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }

    public static function editCaliNotas(Router $router)
    {
        if (!is_auth()) {

            return;
        }


        if ($_SERVER['REQUEST_METHOD'] == 'POST') {



            // echo json_encode($_POST);
            // return;
            $detalleEdit = DetalleNotaAsignatura::find($_POST["Id"]);
            $detalleOriginal = DetalleNotaAsignatura::find($_POST["Id"]);
            $detalleEdit->sincronizar($_POST);

            // echo json_encode($detalle);
            // return;
            // if ($detalleOriginal != $detalleEdit) {

            //     $detallenotaexistente = DetalleNotaAsignatura::whereArray([
            //         'id_detalle_grado_asignatura' => $_POST["id_detalle_grado_asignatura"],
            //         'id_matricula' => $_POST["id_matricula"],
            //     ]);

            //     // if ($detallenotaexistente) {
            //     //     echo json_encode(["alert" => "El registro existe, verifique los datos"]);
            //     //     return;
            //     // }
            // }

         

            $resp =  $detalleEdit->guardar();

            if ($resp) {
                echo json_encode(["exito" => "Se guardo correctamente la nota "]);
                return;
            }


            echo json_encode($_POST);
            return;
        }
        // $detalle = DetalleAnioLectivoGrado::obtenerCalificacionNotas();
        // echo json_encode($detalle);
        return;
    }


    public static function dellCalificacionAsigGrado(Router $router)
    {
        if (!is_auth()) {
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $DetalleAnioGradoTurno =  DetalleAnioLectivoGrado::find($_POST["Id"]);

            $DetalleAnioGradoTurno->Estado = 0;

            $resp = $DetalleAnioGradoTurno->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }
        echo json_encode(['respuesta' => true]);
        return;
    }


    public static function dellAsigGradoNota(Router $router)
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

    public static function dellAsigGradoUnica(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $DetalleAsignaturasNotas =  DetalleNotaAsignatura::find($_POST["Id"]);

            $DetalleAsignaturasNotas->Estado = 0;

            $resp = $DetalleAsignaturasNotas->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }
        echo json_encode(['respuesta' => true]);
        return;
    }
}
