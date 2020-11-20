<?php
    class indexController extends Controller{

        private $datos = array("header" => "headerP", "footer" => "footerP");
        private $data;

        public function __construct(){
            parent::__construct();
            $this->data = $this->loadModel("index");//Si hay modelo lo carga
        }

        public function index(){
            $this->_view->contenido = $this->data->getCiudades();
            $this->_view->getView("index",$this->datos);
        }
    }