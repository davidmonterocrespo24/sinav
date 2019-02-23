<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Consultas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function Dia($usuario, $dia) {

        $this->db->where('domain_id', $id);
        $this->db->delete($this->table);
    }

    function Mes($usuario, $dia) {
        $this->db->where('domain_id', $id);
        $this->db->delete($this->table);
    }

    function DiezDias($usuario) {
        //SELECT 
        //  full_log_10.username,
        //  sum(full_log_10.reply_size)as sum,
        //  full_log_10.squid_request_status
        //FROM
        //  full_log_10
        //WHERE
        //  (squid_request_status <> 'NONE') AND
        //  (squid_request_status <> 'TCP_DENIED')
        //  GROUP by username
        //  ORDER by sum
        $this->db->select('full_log_10.username,
         sum(full_log_10.reply_size)as sum,
          full_log_10.squid_request_status');
        $this->db->where('(squid_request_status <> \'NONE\') AND
         (squid_request_status <> \'TCP_DENIED\')');
        $this->db->order_by("sum", "desc");
        $this->db->group_by('username');
        $query = $this->db->get('full_log_10');
        return $query->result_array();
    }

    function Constructor_consulta($usuario, $dominio, $red, $computadora, $tab) {      
        $tablas = '';
        $grup_by = '';
        $select = $tab.'.squid_request_status,sum('.$tab.'.reply_size)as suma';
        $where = '(squid_request_status <> \'NONE\') AND
         (squid_request_status <> \'TCP_DENIED\')';

        if ($usuario != '' && $dominio == '' && $red == '' && $computadora == '') {
            $select = $select . ' ,username';
            $tablas = ''.$tab.'';
            $grup_by = 'username';
            $where = $where . ' AND ' . ' username=' . $usuario;
        } elseif ($usuario == '' && $dominio != '' && $red == '' && $computadora == '') {
            $select = $select . ', domains.domain,'.$tab.'.domain_id';
            $tablas = $tab .', domains';
            $grup_by = 'domain';
            $where = $where . ' AND ' . ' domains.id=' . $dominio . ' AND ' .$tab.'.domain_id=domains.id';
        } elseif ($usuario == '' && $dominio == '' && $red != '' && $computadora == '' ) {
            $select = $select . ' ,network_id,base';
            $tablas = ''.$tab.',networks';
            $grup_by = 'network_id';
            $where = $where . ' AND ' . ' network_id=' . $red . ' AND  networks.id=' . $red;
        } elseif ($usuario == '' && $dominio == '' && $red == '' && $computadora != '') {
            $select = $select . ' ,client_src_ip_addr';
            $tablas = ''.$tab.'';
            $grup_by = 'client_src_ip_addr';
            $where = $where . ' AND ' . ' client_src_ip_addr=' . $computadora;
        } elseif ($usuario == '' && $dominio == '' && $red == '' && $computadora == '') {
            $tablas = $tab;
        }

        $this->db->select($select);
        $this->db->where($where);
        $this->db->order_by("suma", "desc");
        $this->db->group_by($grup_by);
        $query = $this->db->get($tablas);
        return $query->result_array();
    }

    function consumo_Domino() {
//        SELECT
//        domains.domain,
//        sum(full_log_10.reply_size) AS suma,
//        full_log_10.squid_request_status
//        FROM
//        domains
//        INNER JOIN full_log_10 ON (domains.id = full_log_10.domain_id)
//        WHERE
//        (squid_request_status <> 'NONE') AND
//        (squid_request_status <> 'TCP_DENIED')
//        GROUP BY
//        domains.domain,
//        full_log_10.squid_request_status
//        ORDER BY
//        suma
        $this->db->select('domains.domain,
        sum(full_log_10.reply_size) AS suma,
        full_log_10.squid_request_status');
        $this->db->where('(squid_request_status <> \'NONE\') AND
        (squid_request_status <> \'TCP_DENIED\') AND (domains.id = full_log_10.domain_id)');
        $this->db->order_by("suma", "desc");
        $this->db->group_by('domains.domain');
        $query = $this->db->get('domains , full_log_10');
        return $query->result_array();
    }

}
