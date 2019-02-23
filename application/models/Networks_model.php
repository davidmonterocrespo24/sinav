<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Networks_model extends CI_Model {

    var $table = 'networks';

    function __construct() {
        parent::__construct();
    }

    function get_all($limit = null, $offset = null) {
        $this->db->order_by('base', 'asc');
        $query = $this->db->get($this->table, $limit, $offset);
        return $query->result_array();
    }

    function get_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function get_by_base($id) {
        $this->db->where('base', $id);
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

}
