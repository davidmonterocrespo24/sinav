<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Dominio_model extends CI_Model {

    var $table = 'domains';

    function __construct() {
        parent::__construct();
    }

    function get_all() {
        $this->db->order_by('id', 'desc');
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function get_id($dominio) {
        $this->db->where('domain', $dominio);
        $query = $this->db->get($this->table);
        return $query->result_array();
    }

    function count_all() {
        return $this->db->count_all($this->table);
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id) {
        $this->db->where('id', $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) {
        $this->db->where('id', $id);
        $this->db->delete($this->table);
    }

    function consumo_dominio_fecha($dia1, $dia2, $dominio) {
       $time1 = strtotime($dia1);
        $d1 = idate('d', $time1);
        $m1 = idate('m', $time1);
        $a1 = idate('Y', $time1);
        if ($m1 < 10) {
            $m1 = '0' . $m1;
        }
        if ($d1 < 10) {
            $d1 = '0' . $d1;
        }
        //Where
        $where = 'squid_request_status <> \'NONE\' AND 
              squid_request_status <> \'TCP_DENIED\'';
        //Select
        $select = 'client_src_ip_addr,Sum(reply_size) AS suma';
        //From
        $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
        if ($d1 == $d2) {
            
            return $query->result_array();
        }
        // Mes
        elseif ($d2 - $d1 > 26) {
          //  echo 'mes';
            $mes = idate('m', $time1);
          //  echo $mes;

            return $query->result_array();
        }
        //Semana
        elseif ($d2 - $d1 > 6) {

            return $query->result_array();
        }
    }

    function comMasConsumo($dia1, $dia2) {
     
        $time1 = strtotime($dia1);
        $d1 = idate('d', $time1);
        $m1 = idate('m', $time1);
        $a1 = idate('Y', $time1);
        $time2 = strtotime($dia2);
        $d2 = idate('d', $time2);
        $m2 = idate('m', $time2);
        $a2 = idate('Y', $time2);
      
        if ($m1 < 10) {
            $m1 = '0' . $m1;
        }
        if ($d1 < 10) {
            $d1 = '0' . $d1;
        }
        $from= 'full_log_2016_02_15';
      //  $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
        $select = '';
        $where = '';
        //Hoy o ayer
      //  if ($d1 == $d2) {           
            $select = 'domains.domain,sum(' . $from . '.reply_size) AS suma,' . $from . '.squid_request_status';
            $where = '(squid_request_status <> \'NONE\') AND(squid_request_status <> \'TCP_DENIED\') AND (domains.id = ' . $from . '.domain_id)';
           //   echo 'Select ' . $select .' from domains ,' . $from . " where " . $where;
            $this->db->select($select);
            $this->db->where($where);
            $this->db->order_by("suma", "desc");
           $this->db->group_by('domains.domain');
            $query = $this->db->get('domains ,' . $from);
            return $query->result_array();
       // }
        // Mes
//        if ($d2 - $d1 >= 26) {
//            $mes = idate('m', $time1);           
//        }
//        //Semana
//        elseif ($d2 - $d1 >= 6) {
//            $select = 'domains.domain,sum(full_log_10.reply_size) AS suma,full_log_10.squid_request_status';
//            $where = '(squid_request_status <> \'NONE\') AND(squid_request_status <> \'TCP_DENIED\') AND (domains.id = full_log_10.domain_id)';
//            //  echo 'Select ' . $select .' from domains ,' . $from . " where " . $where;
//            $this->db->select($select);
//            $this->db->where($where);
//            $this->db->order_by("suma", "desc");
//           $this->db->group_by('domains.domain');
//            $query = $this->db->get('domains ,full_log_10');
//            return $query->result_array();
//        }
    }

    function consumoCriterios($dia1, $dia2, $computadora, $usuario, $dominio, $red) {
        $time1 = strtotime($dia1);
        $d1 = idate('d', $time1);
        $m1 = idate('m', $time1);
        $a1 = idate('Y', $time1);
        if ($m1 < 10) {
            $m1 = '0' . $m1;
        }
        if ($d1 < 10) {
            $d1 = '0' . $d1;
        }
        //Where
        $where = 'squid_request_status <> \'NONE\' AND 
              squid_request_status <> \'TCP_DENIED\'';
        //Select
        $select = 'domains.domain,Sum(reply_size) AS suma';
        //From
         $tabla = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
        $from = 'full_log_' . $a1 . '_' . $m1 . '_' . $d1;
        if ($usuario != "") {
            $select = $select . ',username ';
            $where = $where . ' AND username=' . '\'' . $usuario . '\'';
        }

        if ($dominio != "") {
            $select = $select . ', domains.domain ';
            $where = $where . ' AND domains.domain =' . '\'' . $dominio . '\' AND domains.id ='.$tabla .'.domain_id';
            $from = $from . ', domains';
        }

        if ($red != "") {
            $select = $select . ',networks.base ';
            $where = $where . ' AND networks.id=' . '\'' . $red . '\' AND '.$tabla .'.network_id = networks.id';
            $from = $from . ', networks';
        }
        if ($computadora != "") {
            $where = $where . ' AND client_src_ip_addr=' . '\'' . $computadora . '\'';
        }
     //  echo 'Select ' . $select . " from " . $from . " where " . $where;
        $this->db->select($select);
        $this->db->where($where);
        $query = $this->db->get($from);
        return $query->result_array();

    }

}
