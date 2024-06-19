<?php

namespace Model;

class DetalleTutorEstudiante extends ActiveRecord {
    protected static $tabla = 'detalle_tutor_estudiante';
    protected static $columnasDB = ['Id', 'Id_Tutor', 'Id_Estudiante', 'Estado'];

    public $Id;
    public $Id_Tutor;
    public $Id_Estudiante;
    public $Estado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Id_Tutor = $args['Id_Tutor'] ?? null;
        $this->Id_Estudiante = $args['Id_Estudiante'] ?? null;
        $this->Estado = $args['Estado'] ?? 1;
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
     * Get the value of Id_Tutor
     */
    public function getIdTutor() {
        return $this->Id_Tutor;
    }

    /**
     * Set the value of Id_Tutor
     */
    public function setIdTutor($Id_Tutor): self {
        $this->Id_Tutor = $Id_Tutor;
        return $this;
    }

    /**
     * Get the value of Id_Estudiante
     */
    public function getIdEstudiante() {
        return $this->Id_Estudiante;
    }

    /**
     * Set the value of Id_Estudiante
     */
    public function setIdEstudiante($Id_Estudiante): self {
        $this->Id_Estudiante = $Id_Estudiante;
        return $this;
    }
}
?>
