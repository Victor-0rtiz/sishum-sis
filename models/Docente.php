<?php

namespace Model;

class Docente extends ActiveRecord {
    protected static $tabla = 'docente';
    protected static $columnasDB = ['Id', 'Cod_docente', 'Id_Usuario', 'Estado'];

    public $Id;
    public $Cod_docente;
    public $Id_Usuario;
    public $Estado;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Cod_docente = $args['Cod_docente'] ?? '';
        $this->Id_Usuario = $args['Id_Usuario'] ?? null;
        $this->Estado = $args['Estado'] ?? 1;
    }


    public static function obtenerDocentes()
    {
        $nombreSP = 'sp_Get_Docentes';

        return self::ejecutarSP($nombreSP);
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
     * Get the value of Cod_docente
     */
    public function getCodDocente() {
        return $this->Cod_docente;
    }

    /**
     * Set the value of Cod_docente
     */
    public function setCodDocente($Cod_docente): self {
        $this->Cod_docente = $Cod_docente;
        return $this;
    }

    /**
     * Get the value of Id_Usuario
     */
    public function getIdUsuario() {
        return $this->Id_Usuario;
    }

    /**
     * Set the value of Id_Usuario
     */
    public function setIdUsuario($Id_Usuario): self {
        $this->Id_Usuario = $Id_Usuario;
        return $this;
    }
}
?>
