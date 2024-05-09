<?php

namespace Model;

class DetalleAnioLectivoGrado extends ActiveRecord {
    protected static $tabla = 'detalle_aniolectivo_grado';
    protected static $columnasDB = ['Id', 'Id_anio_lectivo', 'id_grado'];

    public $Id;
    public $Id_anio_lectivo;
    public $id_grado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Id_anio_lectivo = $args['Id_anio_lectivo'] ?? null;
        $this->id_grado = $args['id_grado'] ?? null;
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
     * Get the value of Id_anio_lectivo
     */
    public function getIdAnioLectivo() {
        return $this->Id_anio_lectivo;
    }

    /**
     * Set the value of Id_anio_lectivo
     */
    public function setIdAnioLectivo($Id_anio_lectivo): self {
        $this->Id_anio_lectivo = $Id_anio_lectivo;
        return $this;
    }

    /**
     * Get the value of id_grado
     */
    public function getIdGrado() {
        return $this->id_grado;
    }

    /**
     * Set the value of id_grado
     */
    public function setIdGrado($id_grado): self {
        $this->id_grado = $id_grado;
        return $this;
    }
}
?>
