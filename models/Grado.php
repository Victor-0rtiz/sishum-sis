<?php

namespace Model;

class Grado extends ActiveRecord {
    protected static $tabla = 'grado';
    protected static $columnasDB = ['Id', 'Nombre'];

    public $Id;
    public $Nombre;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Nombre = $args['Nombre'] ?? '';
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
?>
