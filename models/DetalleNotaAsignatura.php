<?php

namespace Model;

class DetalleNotaAsignatura extends ActiveRecord {
    protected static $tabla = 'detalle_nota_asignatura';
    protected static $columnasDB = ['Id', 'id_detalle_grado_asignatura', 'id_matricula', 'Nota', 'Nota_2','Nota_3','Nota_4', 'Estado'];

    public $Id;
    public $id_detalle_grado_asignatura;
    public $id_matricula;
    public $Nota;
    public $Nota_2;
    public $Nota_3;
    public $Nota_4;
    public $Estado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->id_detalle_grado_asignatura = $args['id_detalle_grado_asignatura'] ?? null;
        $this->id_matricula = $args['id_matricula'] ?? null;
        $this->Nota = $args['Nota'] ?? 0;
        $this->Nota_2 = $args['Nota_2'] ?? 0;
        $this->Nota_3 = $args['Nota_3'] ?? 0;
        $this->Nota_4 = $args['Nota_4'] ?? 0;
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
     * Get the value of id_detalle_grado_asignatura
     */
    public function getIdDetalleGradoAsignatura() {
        return $this->id_detalle_grado_asignatura;
    }

    /**
     * Set the value of id_detalle_grado_asignatura
     */
    public function setIdDetalleGradoAsignatura($id_detalle_grado_asignatura): self {
        $this->id_detalle_grado_asignatura = $id_detalle_grado_asignatura;
        return $this;
    }

    /**
     * Get the value of id_matricula
     */
    public function getIdMatricula() {
        return $this->id_matricula;
    }

    /**
     * Set the value of id_matricula
     */
    public function setIdMatricula($id_matricula): self {
        $this->id_matricula = $id_matricula;
        return $this;
    }

    /**
     * Get the value of Nota
     */
    public function getNota() {
        return $this->Nota;
    }

    /**
     * Set the value of Nota
     */
    public function setNota($Nota): self {
        $this->Nota = $Nota;
        return $this;
    }
}
?>
