<?php

namespace Controllers;

use Model\DatosPersonales;
use Model\DetalleTutorEstudiante;
use Model\Estudiante;
use Model\Matricula;
use Model\Tutor;
use Model\Usuario;
use MVC\Router;

class MatriculasController
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
        $router->render("dashboard/Matriculas/Matriculas", []);
    }
    public static function getAllMat(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $matriculas = Matricula::obtenerMatriculas();


        echo json_encode($matriculas);
        return;
    }
    public static function getAllMatPorGrado(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $matriculas = Matricula::obtenerMatriculasPorGrado($_POST["dga"]);


        echo json_encode($matriculas);
        return;
    }
    public static function getAllMatPorEstudiante(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $matriculas = Matricula::obtenerMatriculaEstudiante($_POST["Id_Estudiante"]);


        echo json_encode($matriculas);
        return;
    }
    public static function addMatricula(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $idEstudiante = 0;
            $idTutor = 0;


            if (isset($_POST["data_matricula"]) && isset($_POST["TutorExistente"]) && isset($_POST["EstudianteExistente"])) {

                $resultadoMat = Matricula::whereArray([
                    "id_anio_lectivo" => $_POST["data_matricula"]["id_anio_lectivo"],
                    "id_grado" => $_POST["data_matricula"]["id_grado"],
                    "id_turno" => $_POST["data_matricula"]["id_turno"],
                    "Id_estudiante" => $_POST["EstudianteExistente"]["Id_estudiante"],
                    "Id_tutor" => $_POST["TutorExistente"]["Id_Tutor"],
                ]);

                if ($resultadoMat) {
                    echo json_encode(["alert" => "La matricula ya existe, verifique los datos"]);
                    return;
                }
            }


            if (isset($_POST["TutorNuevo"])) {
                $findTutor = Tutor::where("Cedula", $_POST["TutorNuevo"]["Cedula"]);
                if ($findTutor) {
                    echo json_encode(["alert" => "La cedula ingresada ya pertenece a un tutor"]);
                    return;
                }
            }

            if (isset($_POST["EstudianteNuevo"])) {

                $estudianteInfo = Estudiante::where("Cod_estudiante", $_POST["EstudianteInfo"]["Cod_estudiante"]);
                if ($estudianteInfo) {
                    echo json_encode(["alert" => "El codigo de estudiante ya pertenece a un estudiante registrado"]);
                    return;
                }
            }


            if (isset($_POST["EstudianteNuevo"])) {


                $userNombres =  str_replace(" ", "", $_POST["EstudianteNuevo"]["Nombres"]);
                $userApellidos =  str_replace(" ", "", $_POST["EstudianteNuevo"]["Apellidos"]);
                $numeroRandom = random_int(0, 99);
                $fechaCreacion = date('gi');
                $ussername = substr($userNombres, 0, 3) . substr($userApellidos, 0, 3) . $fechaCreacion . $numeroRandom;
                // 'usser', 'password', 'Id_Tipo_Usuario'
                $ussername = trim($ussername);
                $nwuser = new Usuario(["usser" => $ussername,  "Id_Tipo_Usuario" => 4]);

                $nwuser->password = password_hash($nwuser->usser, PASSWORD_BCRYPT);

                $idNewUser = $nwuser->guardar();
                // $idNewUser["Id"] = 12;
                if (!isset($idNewUser["Id"])) {
                    echo json_encode(false);
                    return;
                }

                $dpEstudiante = new DatosPersonales($_POST["EstudianteNuevo"]);
                $estudiante = new Estudiante($_POST["EstudianteInfo"]);

                $dpEstudiante->Id_Usuario = $idNewUser["Id"];
                $estudiante->Id_Usuario = $idNewUser["Id"];


                $resp1 = $dpEstudiante->guardar();
                $resp2 = $estudiante->guardar();
                // $resp2["Id"] = 21;
                $idEstudiante = $resp2["Id"];

                // echo json_encode($idEstudiante);
                // return;

            }


            if (isset($_POST["TutorNuevo"])) {

                $userNombresTutor =  str_replace(" ", "", $_POST["TutorNuevo"]["Nombres"]);
                $userApellidosTutor =  str_replace(" ", "", $_POST["TutorNuevo"]["Apellidos"]);
                $numeroRandom = random_int(0, 99);
                $fechaCreacion = date('gi');
                $ussernameTutor = substr($userNombresTutor, 0, 3) . substr($userApellidosTutor, 0, 3) . $fechaCreacion . $numeroRandom;
                // 'usser', 'password', 'Id_Tipo_Usuario'
                $ussernameTutor = trim($ussernameTutor);
                $nwuserTutor = new Usuario(["usser" => $ussernameTutor,  "Id_Tipo_Usuario" => 3]);

                $nwuserTutor->password = password_hash($nwuserTutor->usser, PASSWORD_BCRYPT);

                $idNewUserTutor = $nwuserTutor->guardar();
                // $idNewUserTutor["Id"] = 55;
                if (!isset($idNewUserTutor["Id"])) {
                    echo json_encode(false);
                    return;
                }

                $dpTutor = new DatosPersonales($_POST["TutorNuevo"]);
                $tutor = new Tutor($_POST["TutorNuevo"]);

                $dpTutor->Id_Usuario = $idNewUserTutor["Id"];
                $tutor->Id_Usuario = $idNewUserTutor["Id"];

                $resp1 = $dpTutor->guardar();
                $resp2 = $tutor->guardar();
                // $resp2["Id"] = 21;
                $idTutor = $resp2["Id"];
            }


            if (isset($_POST["EstudianteExistente"])) {

                $idEstudiante = $_POST["EstudianteExistente"]["Id_estudiante"];
            }
            if (isset($_POST["TutorExistente"])) {

                $idTutor = $_POST["TutorExistente"]["Id_Tutor"];
            }


            $matriculaNew = new Matricula(
                [
                    "Id_estudiante" => $idEstudiante,
                    "Id_tutor" => $idTutor,
                    "id_anio_lectivo" => $_POST["data_matricula"]["id_anio_lectivo"],
                    "id_grado" => $_POST["data_matricula"]["id_grado"],
                    "id_turno" => $_POST["data_matricula"]["id_turno"],
                    "Edad" => $_POST["data_matricula"]["Edad"]
                ]
            );

            $uniqueId = uniqid();
            $matriculaNew->qrhash = hash('sha256', $uniqueId . $matriculaNew->Id_estudiante . $matriculaNew->id_anio_lectivo);

            $datadetalletutorestudiante = DetalleTutorEstudiante::whereArray(["Id_Estudiante" => $idEstudiante, "Id_Tutor" => $idTutor]);

            if (!$datadetalletutorestudiante) {
                $detalletutoestudiante = new DetalleTutorEstudiante(["Id_Estudiante" => $idEstudiante, "Id_Tutor" => $idTutor]);
                $resultadoDetalletut =  $detalletutoestudiante->guardar();
            }



            $resulSaveMatri =  $matriculaNew->guardar();

            if (isset($resulSaveMatri["Id"])) {
                echo json_encode(["exito" => "Se guardo correctamente la matricula "]);
                return;
            }



            echo json_encode(["error" => "Se guardo correctamente la matricula "]);
            return;
        }
        echo json_encode("false");
        return;
    }



    public static function delMatricula(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $matricula =  Matricula::find($_POST["Id"]);

            $matricula->Estado = 0;

            $resp = $matricula->guardar();

            echo json_encode(["exito" => $resp]);
            return;
        }
        $matriculas = "";


        echo json_encode($matriculas);
        return;
    }


    public static function editMatricula(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            // echo json_encode($_POST);
            // return;

            $matriculaSinEditar = Matricula::find($_POST["FormDatosAcademicos"]["Id"]);
            $matriculaDataEdit  = Matricula::find($_POST["FormDatosAcademicos"]["Id"]);
            $matriculaDataEdit->sincronizar($_POST["FormDatosAcademicos"]);

            if ($matriculaSinEditar != $matriculaDataEdit) {

                $matriculaExistente =  Matricula::whereArray([
                    "id_anio_lectivo" => $_POST["FormDatosAcademicos"]["id_anio_lectivo"],
                    "id_grado" => $_POST["FormDatosAcademicos"]["id_grado"],
                    "id_turno" => $_POST["FormDatosAcademicos"]["id_turno"],
                    "Id_estudiante" => $_POST["FormEstudiante"]["Id_estudiante"],
                    "Id_tutor" => $_POST["FormTutor"]["Id_tutor"],
                    "Edad" => $_POST["FormDatosAcademicos"]["Edad"],
                ]);

                if ($matriculaExistente) {
                    echo json_encode(["alert" => "La matricula ya existe, verifique los datos"]);
                    return;
                }
            }


            $estudianteEdit = Estudiante::find($_POST["FormEstudiante"]["Id_estudiante"]);
            $estudianteEdit->sincronizar([
                'Id'=> $_POST["FormEstudiante"]['Id_estudiante'], 
                'Cod_estudiante'=> $_POST["FormEstudiante"]['Cod_estudiante'], 
                'IdMunicipio'=> $_POST["FormEstudiante"]['IdMunicipio'], 
            ]);
            $estudianteDataOriginal= Estudiante::find($_POST["FormEstudiante"]["Id_estudiante"]);

            if ($estudianteEdit != $estudianteDataOriginal) {

                $estudianteexistente =  Estudiante::where('Cod_estudiante', $_POST["FormEstudiante"]['Cod_estudiante']);
                if ($estudianteexistente) {
                    echo json_encode(["alert" => "El codigo de estudiante ya le pertenece a otro estudiante, verifique los datos"]);
                    return;
                }
            }
            $estudianteDatosPersonales = DatosPersonales::find($_POST["FormEstudiante"]["Id_datos_personales"]);

            $tutorEdit = Tutor::find($_POST["FormTutor"]["Id_tutor"]);
            $tutorEdit->sincronizar([
                'Id'=> $_POST["FormTutor"]['Id_tutor'], 
                'Cedula'=> $_POST["FormTutor"]['CedulaTutor'], 
                'Ocupacion'=> $_POST["FormTutor"]['Ocupacion'], 
            ]);
            $tutordataexist = Tutor::find($_POST["FormTutor"]["Id_tutor"]);

            if ($tutorEdit != $tutordataexist) {

                $tutorexistente =  Tutor::where('Cedula', $_POST["FormTutor"]['CedulaTutor']);
                if ($tutorexistente) {
                    echo json_encode(["alert" => "La cedula ingresada ya pertenece a otra persona, verifique los datos"]);
                    return;
                }
            }
            $tutorDatosPersonales = DatosPersonales::find($_POST["FormTutor"]["Id_datos_personales"]);

            $estudianteDatosPersonales->sincronizar([
                'Id'=> $_POST["FormEstudiante"]['Id_datos_personales'], 
                'Apellidos'=> $_POST["FormEstudiante"]['Apellidos'], 
                'Nombres'=> $_POST["FormEstudiante"]['Nombres'], 
                'Telefono'=> $_POST["FormEstudiante"]['TelefonoEstudiante'], 
                'Direccion'=> $_POST["FormEstudiante"]['Direccion'], 
                'Id_sexo'=> $_POST["FormEstudiante"]['Id_sexo'], 
            ]);
            $tutorDatosPersonales->sincronizar([
                'Id'=> $_POST["FormTutor"]['Id_datos_personales'], 
                'Apellidos'=> $_POST["FormTutor"]['Apellidos'], 
                'Nombres'=> $_POST["FormTutor"]['Nombres'], 
                'Telefono'=> $_POST["FormTutor"]['TelefonoTutor'], 
                'Direccion'=> $_POST["FormTutor"]['Direccion'], 
                'Id_sexo'=> $_POST["FormTutor"]['Id_sexo'], 
            ]);

            $resp5 = $estudianteEdit->guardar();
            $resp4 =  $tutorEdit->guardar();
            $resp =   $estudianteDatosPersonales->guardar();
            $resp3 =   $tutorDatosPersonales->guardar();
            $resp2 = $matriculaDataEdit->guardar();

            if ($resp2) {
                echo json_encode(["exito" => "La matricula se actualizo correctamente"]);
                return;
            }
        }
        $matriculas = "";


        echo json_encode($matriculas);
        return;
    }
}
