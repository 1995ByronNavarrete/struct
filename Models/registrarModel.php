<?php

class registrarModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getCorreo($correo){
        $corr = $this->_db->prepare("SELECT count(*) AS existe FROM turista WHERE turCorreo = :corr");
        $corr->execute(["corr" => $correo]);
        return $corr->fetch(PDO::FETCH_OBJ);
    }

    public function getNomUsuario($usuario){
        $corr = $this->_db->prepare("SELECT count(*) AS existe FROM turista WHERE turNombreUsuario = :usu");
        $corr->execute(["usu" => $usuario]);
        return $corr->fetch(PDO::FETCH_OBJ);
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
