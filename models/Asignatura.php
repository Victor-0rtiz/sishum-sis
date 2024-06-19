<?php

namespace Model;

class Asignatura extends ActiveRecord {
    protected static $tabla = 'asignatura';
    protected static $columnasDB = ['Id', 'Nombre', 'Estado'];

    public $Id;
    public $Nombre;
    public $Estado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->Estado = $args['Estado'] ?? 1;
    }

    public static function obtenerAsingaturas()
    {
        $nombreSP = 'sp_Get_asignaturas_grado';

        return self::ejecutarSP($nombreSP);
    }


    /**
     * Get the value of Id
     */
    public function getId() {
        return $this->Id;
    }

    /**
     * Set the value of Id
     */
    public function setId($Id): self {
        $this->Id = $Id;
        return $this;
    }

    /**
     * Get the value of Nombre
     */
    public function getNombre() {
        return $this->Nombre;
    }

    /**
     * Set the value of Nombre
     */
    public function setNombre($Nombre): self {
        $this->Nombre = $Nombre;
        return $this;
    }
}