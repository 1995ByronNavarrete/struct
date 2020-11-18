<?php

class registrarModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function insertTurista($datos)
    {
        $this->_db->prepare("CALL registrarTurista(:nom,:ape,:eda,:tel,:nus,:cor,:pas,:nac,:idi,:tok)")->execute(array(
            "nom" => $datos['nombre'],
            "ape" => $datos['apellido'],
            "eda" => $datos['edad'],
            "tel" => $datos['telefono'],
            "nus" => $datos['nombreUsuario'],
            "cor" => $datos['correo'],
            "pas" => $datos['pass'],
            "nac" => $datos['nacionalidad'],
            "idi" => $datos['idioma'],
            "tok" => $datos['token']
        ));
    }
}
