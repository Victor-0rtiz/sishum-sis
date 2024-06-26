<?php

namespace Controllers;

use Model\DatosPersonales;
use Model\DetalleTutorEstudiante;
use Model\Estudiante;
use Model\Tutor;
use Model\Usuario;
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
    public static function addEstudent(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        if (isset($_POST["TutorNuevo"])) {
            $findTutor = Tutor::where("Cedula", $_POST["TutorNuevo"]["Cedula"]);
            if ($findTutor) {
                echo json_encode(["alert" => "La cedula ingresada ya pertenece a un tutor"]);
                return;
            }
        }
        if ($_POST["estudiante"]) {
            $estudiante = Estudiante::where("Cod_estudiante", $_POST["estudiante"]["Cod_estudiante"]);
            if ($estudiante) {
                echo json_encode(["alert" => "El código ya le pertenece a un estudiante"]);
                return;
            }
        }


        $userNombres =  str_replace(" ", "", $_POST["datos_personales"]["Nombres"]);
        $userApellidos =  str_replace(" ", "", $_POST["datos_personales"]["Apellidos"]);
        $numeroRandom = random_int(0, 99);
        $fechaCreacion = date('gi');

        $ussername = substr($userNombres, 0, 3) . substr($userApellidos, 0, 3) . $fechaCreacion . $numeroRandom;

        // 'usser', 'password', 'Id_Tipo_Usuario'
        $ussername = trim($ussername);
        $nwuser = new Usuario(["usser" => $ussername,  "Id_Tipo_Usuario" => 4]);

        $nwuser->password = password_hash($nwuser->usser, PASSWORD_BCRYPT);

        $idNewUser = $nwuser->guardar();
        // $idNewUser["Id"] = 12;
        // if (!isset($idNewUser["Id"])) {
        //     echo json_encode(false);
        //     return;
        // }

        $dpEstudiante = new DatosPersonales($_POST["datos_personales"]);
        $estudiante = new Estudiante($_POST["estudiante"]);

        $dpEstudiante->Id_Usuario = $idNewUser["Id"];
        $estudiante->Id_Usuario = $idNewUser["Id"];


        $resp1 = $dpEstudiante->guardar();
        $resp2 = $estudiante->guardar();


        if (isset($_POST["TutorExistente"])) {
            // echo json_encode($_POST["TutorExistente"]);
            $tutorData = Tutor::find($_POST["TutorExistente"]["Id_Tutor"]);
            $detalleTutorEstud = new DetalleTutorEstudiante(['Id_Tutor' => $tutorData->Id, 'Id_Estudiante' => $resp2["Id"]]);
            $respDTE =  $detalleTutorEstud->guardar();

            if (isset($respDTE['Id'])) {
                echo json_encode(["exito" => "El estudiante y el tutor se guardaron correctamente"]);
                return;
            }
            echo json_encode(["error" => "ocurrio un error"]);
            return;
        }


        if (isset($_POST["TutorNuevo"])) {

            $tutorNewNombre =  str_replace(" ", "", $_POST["TutorNuevo"]["Nombres"]);
            $tutorNewApellido =  str_replace(" ", "", $_POST["TutorNuevo"]["Apellidos"]);
            $numeroRandom2 = random_int(0, 99);
            $fechaCreacion2 = date('gi');

            $ussername2 = substr($tutorNewNombre, 0, 3) . substr($tutorNewApellido, 0, 3) . $fechaCreacion2 . $numeroRandom2;

            // 'usser', 'password', 'Id_Tipo_Usuario'
            $ussername2 = trim($ussername2);
            $nwuserTutor = new Usuario(["usser" => $ussername2,  "Id_Tipo_Usuario" => 3]);

            $nwuserTutor->password = password_hash($nwuserTutor->usser, PASSWORD_BCRYPT);

            $idNewUserTutor = $nwuserTutor->guardar();
            // $idNewUserTutor["Id"] = 17;
            if (!isset($idNewUserTutor["Id"])) {
                echo json_encode(false);
                return;
            }

            $dpTutorNew = new DatosPersonales($_POST["TutorNuevo"]);
            $tutorNew = new Tutor(["Cedula" => $_POST["TutorNuevo"]["Cedula"], "Ocupacion" => $_POST["TutorNuevo"]["Ocupacion"]]);

            $dpTutorNew->Id_Usuario = $idNewUserTutor["Id"];
            $tutorNew->Id_Usuario = $idNewUserTutor["Id"];


            $respDPTutor = $dpTutorNew->guardar();
            $respTutor = $tutorNew->guardar();


            if (isset($respDPTutor["Id"]) && isset($respTutor["Id"])) {

                $detalleTutorEstud2 = new DetalleTutorEstudiante(['Id_Tutor' => $respTutor["Id"], 'Id_Estudiante' => $resp2["Id"]]);
                $respDTE2 =  $detalleTutorEstud2->guardar();

                if (isset($respDTE2['Id'])) {
                    echo json_encode(["exito" => "El estudiante y el tutor se guardaron correctamente"]);
                    return;
                }
                echo json_encode(["error" => "ocurrio un error"]);
                return;
            }
            if (isset($respDPTutor["Id"])) {
                echo json_encode("Se guardo correctamente solo dp del tutor");
                return;
            }
            if (isset($respTutor["Id"])) {
                echo json_encode("Se guardo correctamente solo el tutor ");
                return;
            }

            echo json_encode($tutorNew);
            return;
        }

        echo json_encode($estudiante);
        return;
    }


    public static function editEstudiante()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            // echo json_encode($_POST);
            // return;

            $estudianteEdit = Estudiante::find($_POST["Id_estudiante"]);
            $estudianteDataOriginal = Estudiante::find($_POST["Id_estudiante"]);
            $estudianteDatosPersonales = DatosPersonales::find($_POST["Id_datos_personales"]);

            $estudianteEdit->sincronizar($_POST);
            $estudianteDatosPersonales->sincronizar($_POST);


             if ($estudianteEdit != $estudianteDataOriginal) {

                $estudianteEditExistente = Estudiante::where("Cod_estudiante", $_POST["Cod_estudiante"]);

                if ($estudianteEditExistente) {
                    echo json_encode(["alert" => "El Código ya le pertenece a otro estudiante, verifique los datos"]);
                    return;
                }
            }

            $estudianteEdit->guardar();
            $resp =   $estudianteDatosPersonales->guardar();

            if ($resp) {
                echo json_encode(["exito" => "El estudiante se actualizo correctamente"]);
                return;
            }



            echo json_encode(["error" => "ocurrio un error"]);
            return;
        }
    }


    public static function delEstudiante(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {


            $estudiante =  Estudiante::find($_POST["Id"]);


            $estudiante->Estado = 0;
            $detalleTutorEstudiantedata = DetalleTutorEstudiante::whereArray(["Id_Estudiante" => $_POST["Id"], "Id_Tutor" => $_POST["Id_Tutor"]]);

            // echo json_encode($detalleTutorEstudiantedata);
            // return;

            $detalleTutorEstudiantedata[0]->Estado = 0;


            $resp = $estudiante->guardar();
            $resp2 = $detalleTutorEstudiantedata[0]->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }

        echo json_encode(['respuesta' => true]);
        return;
    }
}
