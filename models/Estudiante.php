<?php

namespace Model;

class Estudiante extends ActiveRecord {
    protected static $tabla = 'estudiante';
    protected static $columnasDB = ['Id', 'Cod_estudiante', 'Id_Usuario'];

    public $Id;
    public $Cod_estudiante;
    public $Id_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Cod_estudiante = $args['Cod_estudiante'] ?? '';
        $this->Id_Usuario = $args['Id_Usuario'] ?? null;
    }

    public static function obtenerEstudiantes()
    {
        $nombreSP = 'sp_Get_Estudiantes';

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
     * Get the value of Cod_estudiante
     */
    public function getCodEstudiante() {
        return $this->Cod_estudiante;
    }

    /**
     * Set the value of Cod_estudiante
     */
    public function setCodEstudiante($Cod_estudiante): self {
        $this->Cod_estudiante = $Cod_estudiante;
        return $this;
    }

    /**
     * Get the value of Id_Usuario
     */
    public function getIdUsuario() {
        return $this->Id_Usuario;
    }

    /**
     * Set the value of Id_Usuario
     */
    public function setIdUsuario($Id_Usuario): self {
        $this->Id_Usuario = $Id_Usuario;
        return $this;
    }
}
?>
