<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Data_model extends CI_Model {

    var $table = 'datos';

    function __construct() {
        parent::__construct();
    }

    function get_all($limit = null, $offset = null) {
        $this->db->order_by('ip', 'desc');
        $query = $this->db->get($this->table, $limit, $offset);
        return $query->result();
    }

    function get_by_id($id) {
        $this->db->where('ip', $id);
        $query = $this->db->get($this->table);
        return $query->row();
    }

    function get_id($id) {
        $this->db->where('ip', $id);
        $query = $this->db->get($this->table);
        return $query->result();
    }

    function count_all() {
        return $this->db->count_all($this->table);
    }

    function insert($data) {
        $this->db->insert($this->table, $data);
    }

    function update($data, $id) {
        $this->db->where('ip', $id);
        $this->db->update($this->table, $data);
    }

    function delete($id) {
        $this->db->where('ip', $id);
        $this->db->delete($this->table);
    }

    function set_user_online() {
        $now = date("Y-m-d H:i:s");
        $ip = $_SERVER['REMOTE_ADDR'];       
        echo $ip;
        if (count($this->get_id($ip)) != 0) {
            echo "CAntidad.." . count($this->get_id($ip)) . "....";
            $on_line = $this->get_all();
            if (!empty($on_line)) {
                echo 'No esta vacio';
                foreach ($on_line as $list) {
                    $last_chat = $list->fecha;
                    $now = date("Y-m-d H:i:s");
                    $diff = strtotime($now) - strtotime($last_chat);
                    $fullDays = floor($diff / (60 * 60 * 24));
                    $fullHours = floor(($diff - ($fullDays * 60 * 60 * 24)) / (60 * 60));
                    $fullMinutes = floor(($diff - ($fullDays * 60 * 60 * 24) - ($fullHours * 60 * 60)) / 60);
                    $idle = false;
                    if ($fullDays > 1) {
                        $idle = true;
                    } else if ($fullHours > 1) {
                        $idle = true;
                    } else if ($fullMinutes > 5) {
                        echo "paso mas de 15 mint   ";
                        $idle = true;
                    } else{
                        echo "   no paso mas de 15 mint";
                        $idle = false;
                    }
                    if ($idle) {
                        $this->delete($list->ip);
                    }
                }
            }
        } else {
            $data = array(
                'fecha' => $now,
                'status' => 1,
                'ip' => $ip
            );
            $this->db->insert('datos', $data);
        }
    }

}
