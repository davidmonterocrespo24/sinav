<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Computadora_model extends CI_Model {

    function __construct() {
        parent::__construct();
        $this->load->model('Dominio_model');
    }

    function consumo_computadora_fecha($dia1, $dia2, $ip) {
        $time1 = strtotime($dia1);
        $time2 = strtotime($dia2);
        $d1 = idate('z', $time1);
        $d2 = idate('z', $time2);
        $time3 = strtotime($dia1);
        $time4 = strtotime($dia2);
        //Hoy o ayer
      //  echo 'Consumo Fecha';
        if ($d1 == $d2) {
            echo 'dia';
            $this->db->where('type=\'d\' AND value2=' . '\'' . $d1 . '\'  AND name=' . '\'' . $ip . '\'');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
        // Mes
        elseif ($d2 - $d1 > 26) {
          //  echo 'mes';
            $mes = idate('m', $time1);
           // echo $mes;
            $this->db->where('type=\'m\' AND value2=' . '\'' . $mes . '\'  AND name=' . '\'' . $ip . '\'');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
        //Semana
        elseif ($d2 - $d1 > 6) {
          //  echo 'semana';
            $semana = idate('w', $time1);
          //  echo $semana;
            $this->db->where('type=\'m\' AND value2=' . '\'' . $semana . '\'  AND name=' . '\'' . $ip . '\'');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
    }

    function comMasConsumo($dia1, $dia2) {
        $time1 = strtotime($dia1);
        $time2 = strtotime($dia2);
        $d1 = idate('z', $time1);
        $d2 = idate('z', $time2);
        $time3 = strtotime($dia1);
        $time4 = strtotime($dia2);
        //Hoy o ayer
        if ($d1 == $d2) {
            $this->db->select('bandwidth_usage.name,Sum(bandwidth_usage.bytes) AS suma');
            $this->db->where('type=\'d\' AND value2=' . $d1);
            $this->db->order_by("suma", "desc");
            $this->db->group_by('bandwidth_usage.name');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
        // Mes
        if ($d2 - $d1 > 26) {
            $mes = idate('m', $time1);
          //  echo $mes;
            $this->db->select('bandwidth_usage.name,Sum(bandwidth_usage.bytes) AS suma');
            $this->db->where('type=\'m\' AND value2=' . '\'' . $mes . '\'');
            $this->db->order_by("suma", "desc");
            $this->db->group_by('bandwidth_usage.name');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
        //Semana
        elseif ($d2 - $d1 > 6) {
            $semana = idate('w', $time1);
           // echo $semana;
            $this->db->select('bandwidth_usage.name,Sum(bandwidth_usage.bytes) AS suma');
            $this->db->where('type=\'m\' AND value2=' . $semana);
            $this->db->order_by("suma", "desc");
            $this->db->group_by('bandwidth_usage.name');
            $query = $this->db->get('bandwidth_usage');
            return $query->result_array();
        }
    }

    function consumoCriterios($dia1, $dia2, $computadora, $usuario, $dominio, $red) {
        $time1 = strtotime($dia1);
        $time2 = strtotime($dia2);
        $d1 = idate('d', $time1);
        $d2 = idate('d', $time2);
        $m1 = idate('m', $time1);
        $a1 = idate('Y', $time1);
        if ($m1 < 10) {
            $m1 = '0' . $m1;
        }
        if ($d1 < 10) {
            $d1 = '0' . $d1;
        }
        if ($d2 < 10) {
            $d2 = '0' . $d2;
        }
        //Where
        $where = 'squid_request_status <> \'NONE\' AND 
              squid_request_status <> \'TCP_DENIED\'';
        //Select
        $select = 'client_src_ip_addr,Sum(reply_size) AS suma';
        //From
        if ($d1 == $d2) {
            $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $from . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $from . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
            }
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get($from);
            return $query->result_array();
        }
        // Mes
        if ($d2 - $d1 > 26) {
            $mes = idate('m', $time1);
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $from . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $from . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
            }
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get($from);
            return $query->result_array();
        }
        //Semana
        elseif ($d2 - $d1 >= 6) {
            $from = 'full_log_10';
           
          //  echo 'semana';
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $from . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $from . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
            }
                    
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get($from);
            return $query->result_array();
        }
    }

}
