<?php

namespace Model;

class Administrador extends ActiveRecord {
    protected static $tabla = 'administrador';
    protected static $columnasDB = ['Id', 'Cod_administrador', 'Id_Usuario'];

    public $Id;
    public $Cod_administrador;
    public $Id_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->Cod_administrador = $args['Cod_administrador'] ?? '';
        $this->Id_Usuario = $args['Id_Usuario'] ?? null;
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
     * Get the value of Cod_administrador
     */
    public function getCodAdministrador() {
        return $this->Cod_administrador;
    }

    /**
     * Set the value of Cod_administrador
     */
    public function setCodAdministrador($Cod_administrador): self {
        $this->Cod_administrador = $Cod_administrador;
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
