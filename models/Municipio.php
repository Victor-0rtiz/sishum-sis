<?php

namespace Model;

class Municipio extends ActiveRecord {
    protected static $tabla = 'municipio';
    protected static $columnasDB = ['IdMunicipio', 'Nombre', 'IdDepartamento'];

    public $IdMunicipio;
    public $Nombre;
    public $IdDepartamento;

    public function __construct($args = [])
    {
        $this->IdMunicipio = $args['IdMunicipio'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
        $this->IdDepartamento = $args['IdDepartamento'] ?? null;
    }

 

    

    /**
     * Get the value of IdMunicipio
     */
    public function getIdMunicipio() {
        return $this->IdMunicipio;
    }

    /**
     * Set the value of IdMunicipio
     */
    public function setIdMunicipio($IdMunicipio): self {
        $this->IdMunicipio = $IdMunicipio;
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

    /**
     * Get the value of IdDepartamento
     */
    public function getIdDepartamento() {
        return $this->IdDepartamento;
    }

    /**
     * Set the value of IdDepartamento
     */
    public function setIdDepartamento($IdDepartamento): self {
        $this->IdDepartamento = $IdDepartamento;
        return $this;
    }
}