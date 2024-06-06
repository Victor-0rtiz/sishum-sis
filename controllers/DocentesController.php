<?php

namespace Controllers;

use Model\DatosPersonales;
use Model\Docente;
use Model\Usuario;
use MVC\Router;

class DocentesController
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
        $router->render("dashboard/Docentes/Docentes", []);
    }

    public static function getAllDocentes(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $docentes =  Docente::obtenerDocentes();


        echo json_encode($docentes);
        return;
    }
    public static function addDocente(Router $router)
    {
        if (!is_auth()) {
            header('Location: /');
            return;
        }

        $userNombres =  str_replace(" ", "", $_POST["datos_personales"]["Nombres"]);
        $userApellidos =  str_replace(" ", "", $_POST["datos_personales"]["Apellidos"]);
        $numeroRandom = random_int(0, 99);
        $fechaCreacion = date('gi');

        $ussername = substr($userNombres, 0, 3) . substr($userApellidos, 0, 3) . $fechaCreacion . $numeroRandom;

        // 'usser', 'password', 'Id_Tipo_Usuario'
        $nwuser = new Usuario(["usser" => $ussername,  "Id_Tipo_Usuario" => 2]);

        $nwuser->password = password_hash($nwuser->usser, PASSWORD_BCRYPT);


        $idNewUser = $nwuser->guardar();
        // $idNewUser = ["Id" => 14];

        if (!isset($idNewUser["Id"])) {
            echo json_encode(false);
            return;
        }

        // echo json_encode(true);
        // return;

        $dpDocente =  new DatosPersonales($_POST["datos_personales"]);
        $nwDocente = new Docente($_POST["docente"]);

        $nwDocente->Cod_docente =  str_replace(" ", "", $_POST["docente"]["Cod_docente"]);

        $dpDocente->Id_Usuario = $idNewUser["Id"];
        $nwDocente->Id_Usuario = $idNewUser["Id"];

        $resp1 =  $nwDocente->guardar();
        $resp2 =  $dpDocente->guardar();

        if (isset($resp1["Id"]) && isset($resp2["Id"])) {
            echo json_encode(["resp"=>"Se guardo correctamente el docente", "act"=>true]);
            return;
        }
        if (isset($resp1["Id"]) ) {
            echo json_encode("Se guardo correctamente solo  el docente");
            return;
        }
        if (isset($resp2["Id"]) ) {
            echo json_encode("Se guardo correctamente solo los datos personales ");
            return;
        }




        echo json_encode($dpDocente);
        return;
    }
}
