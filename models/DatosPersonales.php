<?php

namespace Model;



class DatosPersonales extends ActiveRecord {
    protected static $tabla = 'datos_personales';
    protected static $columnasDB = ['Id', 'Nombres', 'Apellidos', 'Telefono', 'Direccion', 'id_sexo', 'id_Usuario'];

    public $Id;
    public $Nombres;
    public $Apellidos;
    public $Telefono;
    public $Direccion;
    public $id_sexo;
    public $id_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Nombres = $args['Nombres'] ?? '';
        $this->Apellidos = $args['Apellidos'] ?? '';
        $this->Telefono = $args['Telefono'] ?? '';
        $this->Direccion = $args['Direccion'] ?? '';
        $this->id_sexo = $args['id_sexo'] ?? null;
        $this->id_Usuario = $args['id_Usuario'] ?? null;
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
        return $this->id_sexo;
    }

    /**
     * Set the value of id_sexo
     */
    public function setIdSexo($id_sexo): self {
        $this->id_sexo = $id_sexo;
        return $this;
    }

    /**
     * Get the value of id_Usuario
     */
    public function getIdUsuario() {
        return $this->id_Usuario;
    }

    /**
     * Set the value of id_Usuario
     */
    public function setIdUsuario($id_Usuario): self {
        $this->id_Usuario = $id_Usuario;
        return $this;
    }
}