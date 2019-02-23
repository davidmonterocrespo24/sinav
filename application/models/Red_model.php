<?php

/**
 * 
 * @author David20
 */
class Red_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function comMasConsumo($dia1, $dia2) {
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
        //Hoy o ayer
        if ($d1 == $d2) {
            $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            $this->db->select('networks.base as name, sum(' . $from . '.reply_size) as suma');
            $this->db->where($from . '.network_id = networks.id AND
                              squid_request_status <> \'NONE\' AND
                              squid_request_status <> \'TCP_DENIED\'');
            $this->db->order_by("suma", "desc");
            $this->db->group_by('base');
            $query = $this->db->get($from . ',networks');
            return $query->result_array();
        }
        // Mes
        if ($d2 - $d1 >= 26) {
            $mes = idate('m', $time1);
            return $query->result_array();
        }
        //Semana
        elseif ($d2 - $d1 >= 6) {
            $this->db->select('networks.base as name, sum(full_log_10.reply_size) as suma');
            $this->db->where('full_log_10.network_id = networks.id AND
                            squid_request_status <> \'NONE\' AND
                             squid_request_status <> \'TCP_DENIED\'');
            $this->db->group_by('base');
            $this->db->order_by("suma", "desc");
            $query = $this->db->get('full_log_10,networks');
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
        $select = 'Sum(reply_size) AS suma';
        //From
        if ($d1 == $d2) {
            $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            $tabla = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $tabla . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $tabla . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $select = $select . ',client_src_ip_addr';
                $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
            }
            // echo ' '.$select." ".$from." ".$where;
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get($from);
            return $query->result_array();
        }
        // Mes
        if ($d2 - $d1 >= 26) {
            $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            $tabla = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
            $mes = idate('m', $time1);
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $tabla . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $tabla . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $select = $select . ',client_src_ip_addr';
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
            $tabla = 'full_log_10';
            // echo 'semana';
            if ($usuario != "") {
                $select = $select . ',username ';
                $where = $where . ' AND username=' . '\'' . $usuario . '\'';
            }

            if ($dominio != "") {
                $select = $select . ', domains.domain ';
                $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id =' . $tabla . '.domain_id';
                $from = $from . ', domains';
            }

            if ($red != "") {
                $select = $select . ',networks.base ';
                $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND ' . $tabla . '.network_id = networks.id';
                $from = $from . ', networks';
            }
            if ($computadora != "") {
                $select = $select . ',client_src_ip_addr';
                $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
            }
            //  echo 'select ' . $select . "from " . $from . " where " . $where;
            $this->db->select($select);
            $this->db->where($where);
            $query = $this->db->get($from);
            return $query->result_array();
        }
    }

}
