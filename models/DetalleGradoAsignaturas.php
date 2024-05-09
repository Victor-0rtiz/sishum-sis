<?php

namespace Model;

class DetalleGradoAsignaturas extends ActiveRecord {
    protected static $tabla = 'detalle_grado_asignaturas';
    protected static $columnasDB = ['Id', 'Id_detalle_aniolectivo_grado', 'Id_asignatura', 'Id_docente'];

    public $Id;
    public $Id_detalle_aniolectivo_grado;
    public $Id_asignatura;
    public $Id_docente;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Id_detalle_aniolectivo_grado = $args['Id_detalle_aniolectivo_grado'] ?? null;
        $this->Id_asignatura = $args['Id_asignatura'] ?? null;
        $this->Id_docente = $args['Id_docente'] ?? null;
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
     * Get the value of Id_detalle_aniolectivo_grado
     */
    public function getIdDetalleAniolectivoGrado() {
        return $this->Id_detalle_aniolectivo_grado;
    }

    /**
     * Set the value of Id_detalle_aniolectivo_grado
     */
    public function setIdDetalleAniolectivoGrado($Id_detalle_aniolectivo_grado): self {
        $this->Id_detalle_aniolectivo_grado = $Id_detalle_aniolectivo_grado;
        return $this;
    }

    /**
     * Get the value of Id_asignatura
     */
    public function getIdAsignatura() {
        return $this->Id_asignatura;
    }

    /**
     * Set the value of Id_asignatura
     */
    public function setIdAsignatura($Id_asignatura): self {
        $this->Id_asignatura = $Id_asignatura;
        return $this;
    }

    /**
     * Get the value of Id_docente
     */
    public function getIdDocente() {
        return $this->Id_docente;
    }

    /**
     * Set the value of Id_docente
     */
    public function setIdDocente($Id_docente): self {
        $this->Id_docente = $Id_docente;
        return $this;
    }
}
?>
