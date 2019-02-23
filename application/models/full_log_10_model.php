<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Full_log_10_model extends CI_Model {

    var $table = 'full_log_10';

    function __construct() {
        parent::__construct();
    }

    function get_all($limit = null, $offset = null) {
        $this->db->order_by('domain_id', 'desc');
        $query = $this->db->get($this->table, $limit, $offset);
        return $query->result();
    }

    function get_by_id($id) {
        $this->db->where('domain_id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function count_all() {
        return $this->db->count_all($this->table);
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id) {
        $this->db->where('domain_id', $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) {
        $this->db->where('domain_id', $id);
        $this->db->delete($this->table);
    }

}
