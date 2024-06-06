<?php

namespace Model;



class DatosPersonales extends ActiveRecord {
    protected static $tabla = 'datos_personales';
    protected static $columnasDB = ['Id', 'Nombres', 'Apellidos', 'Telefono', 'Direccion', 'Id_sexo', 'Id_Usuario'];

    public $Id;
    public $Nombres;
    public $Apellidos;
    public $Telefono;
    public $Direccion;
    public $Id_sexo;
    public $Id_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Nombres = $args['Nombres'] ?? '';
        $this->Apellidos = $args['Apellidos'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
        $this->Direccion = $args['Direccion'] ?? '';
        $this->Id_sexo = $args['Id_sexo'] ?? null;
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
     * Get the value of Nombres
     */
    public function getNombres() {
        return $this->Nombres;
    }

    /**
     * Set the value of Nombres
     */
    public function setNombres($Nombres): self {
        $this->Nombres = $Nombres;
        return $this;
    }

    /**
     * Get the value of Apellidos
     */
    public function getApellidos() {
        return $this->Apellidos;
    }

    /**
     * Set the value of Apellidos
     */
    public function setApellidos($Apellidos): self {
        $this->Apellidos = $Apellidos;
        return $this;
    }

    /**
     * Get the value of Telefono
     */
    public function getTelefono() {
        return $this->Telefono;
    }

    /**
     * Set the value of Telefono
     */
    public function setTelefono($Telefono): self {
        $this->Telefono = $Telefono;
        return $this;
    }

    /**
     * Get the value of Direccion
     */
    public function getDireccion() {
        return $this->Direccion;
    }

    /**
     * Set the value of Direccion
     */
    public function setDireccion($Direccion): self {
        $this->Direccion = $Direccion;
        return $this;
    }

    /**
     * Get the value of id_sexo
     */
    public function getIdSexo() {
        return $this->Id_sexo;
    }

    /**
     * Set the value of id_sexo
     */
    public function setIdSexo($id_sexo): self {
        $this->Id_sexo = $id_sexo;
        return $this;
    }

    /**
     * Get the value of id_Usuario
     */
    public function getIdUsuario() {
        return $this->Id_Usuario;
    }

    /**
     * Set the value of id_Usuario
     */
    public function setIdUsuario($id_Usuario): self {
        $this->Id_Usuario = $id_Usuario;
        return $this;
    }
}