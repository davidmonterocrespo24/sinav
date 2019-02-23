<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class masvistadas_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function get_Mas_Visitadas() {
        //SELECT  DISTINCT count(domains.domain) AS cant, domains.id, domains.domain
        //FROM full_log_10, domains 
        //where (domains.id = full_log_10.domain_id) 
        //GROUP BY domains.domain 
        //ORDER by cant desc
        $this->db->distinct();
        $this->db->select('count(domains.domain) AS cantidad, domains.id, domains.domain');
        $this->db->where('domains.id = full_log_10.domain_id');
        $this->db->order_by("cantidad", "desc");
        $this->db->group_by('domains.domain ');        
        $query = $this->db->get('full_log_10, domains',10);
        return $query->result_array();
    }

}
