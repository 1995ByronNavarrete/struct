<?php
    class interpretesController extends Controller{
        private $datos = array("header" => "headerP", "footer" => "footerP");

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->_view->getView("index",$this->datos);
        }
    }