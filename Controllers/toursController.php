<?php
    class toursController extends Controller{
        private $datos = array("header" => "headerP", "footer" => "footerP");

        public function __construct(){
            parent::__construct();
        }

        public function index(){
            $this->_view->getView("index",$this->datos);
        }
    }