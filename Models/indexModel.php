<?php

class indexModel extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    public function getCiudades()
    {
        return $this->_db->query("SELECT * FROM localizacion")->fetchAll(PDO::FETCH_OBJ);
       
    }
}
