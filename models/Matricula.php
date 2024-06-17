<?php

namespace Model;

class Matricula extends ActiveRecord {
    protected static $tabla = 'matricula';
    protected static $columnasDB = ['Id', 'Id_estudiante', 'Id_tutor', 'id_grado', 'id_turno', 'id_anio_lectivo' ,'qrhash'];

    public $Id;
    public $Id_estudiante;
    public $Id_tutor;
    public $id_grado;
    public $id_turno;
    public $id_anio_lectivo;
    public $qrhash;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Id_estudiante = $args['Id_estudiante'] ?? null;
        $this->Id_tutor = $args['Id_tutor'] ?? null;
        $this->id_grado = $args['id_grado'] ?? null;
        $this->id_turno = $args['id_turno'] ?? null;
        $this->id_anio_lectivo = $args['id_anio_lectivo'] ?? null;
        $this->qrhash = $args['qrhash'] ?? '';
    }


    public static function obtenerMatriculas()
    {
        $nombreSP = 'sp_Get_Matriculas';

        return self::ejecutarSP($nombreSP);
    }
    public static function obtenerMatriculasPorGrado($idGrado)
    {
        $nombreSP = 'sp_Get_MatriculasPorGrado';

        return self::ejecutarSP($nombreSP,[$idGrado]);
    }
    public static function obtenerMatriculaUnica($IdMatricula)
    {
        $nombreSP = 'sp_MatriculaReporte';

        return self::ejecutarSP($nombreSP,[$IdMatricula]);
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
     * Get the value of Id_estudiante
     */
    public function getIdEstudiante() {
        return $this->Id_estudiante;
    }

    /**
     * Set the value of Id_estudiante
     */
    public function setIdEstudiante($Id_estudiante): self {
        $this->Id_estudiante = $Id_estudiante;
        return $this;
    }

    /**
     * Get the value of Id_tutor
     */
    public function getIdTutor() {
        return $this->Id_tutor;
    }

    /**
     * Set the value of Id_tutor
     */
    public function setIdTutor($Id_tutor): self {
        $this->Id_tutor = $Id_tutor;
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

    /**
     * Get the value of id_turno
     */
    public function getIdTurno() {
        return $this->id_turno;
    }

    /**
     * Set the value of id_turno
     */
    public function setIdTurno($id_turno): self {
        $this->id_turno = $id_turno;
        return $this;
    }

    /**
     * Get the value of id_anio_lectivo
     */
    public function getIdAnioLectivo() {
        return $this->id_anio_lectivo;
    }

    /**
     * Set the value of id_anio_lectivo
     */
    public function setIdAnioLectivo($id_anio_lectivo): self {
        $this->id_anio_lectivo = $id_anio_lectivo;
        return $this;
    }
}
?>
