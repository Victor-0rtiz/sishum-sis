<?php

namespace Model;

class DetalleAnioLectivoGrado extends ActiveRecord {
    protected static $tabla = 'detalle_aniolectivo_grado';
    protected static $columnasDB = ['Id', 'Id_anio_lectivo', 'id_grado', 'id_turno'];

    public $Id;
    public $Id_anio_lectivo;
    public $id_grado;
    public $id_turno;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Id_anio_lectivo = $args['Id_anio_lectivo'] ?? null;
        $this->id_grado = $args['id_grado'] ?? null;
        $this->id_turno = $args['id_turno'] ?? null;
    }

    public static function obtenerGradoanio()
    {
        $nombreSP = 'sp_Get_Detalle_aniolectivo_grado_turno';

        return self::ejecutarSP($nombreSP);
    }

    public static function obtenerCalificacionAsignatura($iddag, )
    {
        $nombreSP = 'sp_Get_Detalle_grado_asignatura';

        return self::ejecutarSP($nombreSP, [$iddag,]);
    }
    public static function obtenerCalificacionNotas($idDGA)
    {
        $nombreSP = 'sp_Get_detalle_nota_asignatura';

        return self::ejecutarSP($nombreSP, [$idDGA]);
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
