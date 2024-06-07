<?php

namespace Controllers;

use Model\Departamento;
use Model\Municipio;
use MVC\Router;

class DepartamentosController
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


    public static function getAllDepartamentos(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $detalle = Departamento::all();
        echo json_encode($detalle);
        return;

   
    }
    public static function getAllMunicipios(Router $router)
    {
        if (!is_auth()) {

            return;
        }

        $detalle = Municipio::all();
        echo json_encode($detalle);
        return;

       
    }
}
