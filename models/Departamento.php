<?php

namespace Model;

class Departamento extends ActiveRecord {
    protected static $tabla = 'departamento';
    protected static $columnasDB = ['IdDepartamento', 'Nombre'];

    public $IdDepartamento;
    public $Nombre;

    public function __construct($args = [])
    {
        $this->IdDepartamento= $args['IdDepartamento'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
    }

   


  
}