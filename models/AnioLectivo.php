<?php

namespace Model;
class AnioLectivo extends ActiveRecord {
    protected static $tabla = 'anio_lectivo';
    protected static $columnasDB = ['Id', 'anio'];

    public $Id;
    public $anio;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->anio = $args['anio'] ?? null;
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
     * Get the value of anio
     */
    public function getAnio() {
        return $this->anio;
    }

    /**
     * Set the value of anio
     */
    public function setAnio($anio): self {
        $this->anio = $anio;
        return $this;
    }
}