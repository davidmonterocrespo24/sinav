<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class TablasPorDias extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_Tablas_Dias_Log(String $tabla) {
        $this->db->list_tables();        
    }

}
