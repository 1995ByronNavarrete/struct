<?php
    class registrarController extends Controller{
        private $datos = array("header" => "headerP", "footer" => "footerP");
        private $modeloReg;

        public function __construct(){
            parent::__construct();
            $this->modeloReg = $this->loadModel("registrar");
        }

        public function index(){
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $datos = array(
                    "nombre" => Helpers::nombresValidos(Helpers::strClean($this->getTexto('nombre'))),
                    "apellido" => Helpers::nombresValidos(Helpers::strClean($this->getTexto('apellido'))),
                    "edad" => Helpers::edadValida(Helpers::strClean($this->getTexto('edad'))),
                    "telefono" => $this->getTexto('telefono'),
                    "nacionalidad" => Helpers::nombresValidos(Helpers::strClean($this->getTexto('nacionalidad'))),
                    "idioma" => Helpers::nombresValidos(Helpers::strClean($this->getTexto('idioma'))),
                    "nombreUsuario" => Helpers::nombresValidos(Helpers::strClean($this->getTexto('nombreUsuario'))),
                    "correo" => Helpers::correoValido($this->getTexto('correo')),
                    "pass" => Helpers::encriptarPassword($this->getTexto('pass')),
                    "token" => Helpers::token()
                );

                $this->modeloReg->insertTurista($datos);
                $this->redireccionar("index");

            }else $this->_view->getView("index",$this->datos);
        }
    }