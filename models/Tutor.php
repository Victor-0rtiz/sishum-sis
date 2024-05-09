<?php

namespace Model;

class Tutor extends ActiveRecord {
    protected static $tabla = 'tutor';
    protected static $columnasDB = ['Id', 'Cedula', 'Ocupacion', 'Id_Usuario'];

    public $Id;
    public $Cedula;
    public $Ocupacion;
    public $Id_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Cedula = $args['Cedula'] ?? '';
        $this->Ocupacion = $args['Ocupacion'] ?? '';
        $this->Id_Usuario = $args['Id_Usuario'] ?? null;
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
     * Get the value of Cedula
     */
    public function getCedula() {
        return $this->Cedula;
    }

    /**
     * Set the value of Cedula
     */
    public function setCedula($Cedula): self {
        $this->Cedula = $Cedula;
        return $this;
    }

    /**
     * Get the value of Ocupacion
     */
    public function getOcupacion() {
        return $this->Ocupacion;
    }

    /**
     * Set the value of Ocupacion
     */
    public function setOcupacion($Ocupacion): self {
        $this->Ocupacion = $Ocupacion;
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
