<?php

class Datos_basicos_model extends CI_Model {
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('utilities/utilities_model');
    }

    public function hola(){
    	$this->utilities_model->test();
    }

} // /class Datos_basicos_model.php
//Location: ./modules/cargar_data/datos_basicos_model.php