<?php

namespace Model;

class Usuario extends ActiveRecord
{
    protected static $tabla = 'usuario';
    protected static $columnasDB = ['Id', 'usser', 'password', 'Id_Tipo_Usuario'];

    public $Id;
    public $usser;
    public $password;
    public $Id_Tipo_Usuario;

    public function __construct($args = [])
    {
        $this->Id = $args['Id'] ?? null;
        $this->usser = $args['usser'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->Id_Tipo_Usuario = $args['Id_Tipo_Usuario'] ?? null;
    }


    // Validar el Login de Usuarios
    public function validarLogin()
    {
        if (!$this->usser) {
            self::$alertas['error'][] = 'El  Usuario es Obligatorio';
        }

        if (!$this->password) {
            self::$alertas['error'][] = 'La Contraseña no puede ir vacía';
        }
        return self::$alertas;
    }

    public static function obtenerUsuarios()
    {
        $nombreSP = 'sp_Get_Usuarios';

        return self::ejecutarSP($nombreSP);
    }


    /**
     * Get the value of Id
     */
    public function getId()
    {
        return $this->Id;
    }

    /**
     * Set the value of Id
     */
    public function setId($Id): self
    {
        $this->Id = $Id;
        return $this;
    }

    /**
     * Get the value of usser
     */
    public function getUsser()
    {
        return $this->usser;
    }

    /**
     * Set the value of usser
     */
    public function setUsser($usser): self
    {
        $this->usser = $usser;
        return $this;
    }

    /**
     * Get the value of password
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     */
    public function setPassword($password): self
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Get the value of Id_Tipo_Usuario
     */
    public function getIdTipoUsuario()
    {
        return $this->Id_Tipo_Usuario;
    }

    /**
     * Set the value of Id_Tipo_Usuario
     */
    public function setIdTipoUsuario($Id_Tipo_Usuario): self
    {
        $this->Id_Tipo_Usuario = $Id_Tipo_Usuario;
        return $this;
    }
}
