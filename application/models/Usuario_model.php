<?php

/**
 * Description of Usuario_model
 *
 * @author David20
 */
class Usuario_model extends CI_Model {

    function __construct() {
        parent::__construct();
    }

    function consumo_usuario($nombre) {
        $this->db->select('usuario,tiempo,SUM(consumo) AS suma');
        $this->db->where('usuario=' . '\'' . $nombre . '\'');
        $this->db->group_by('tiempo');
        $this->db->order_by("tiempo", "desc");
        $query = $this->db->get('totales_10');
        $result_array = $query->result_array();
        $fecha = date('Y-m-j');
        $tabla = array();
        $contador = 0;

        for ($i = 0; $i < 7; $i++) {
            $nuevafecha = strtotime('-' . $i . ' day', strtotime($fecha));
            $nuevafecha = date('Y-m-d', $nuevafecha);

            if ($result_array[$contador]['tiempo'] != $nuevafecha) {
                $tabla[$i]['tiempo'] = $nuevafecha;
                $tabla[$i]['suma'] = 0;
                // $contador--;
            } else {
                $tabla[$i]['tiempo'] = $result_array[$contador]['tiempo'];
                $tabla[$i]['suma'] = $result_array[$contador]['suma'];
                $contador++;
            }
        }
        $tabla[0]['usuario'] = $result_array[0]['usuario'];
        return $tabla;
    }

    function consumo_usuario_28($nombre) {
        //select usuario,tiempo,SUM(consumo) from squid_log_db.totales_full where usuario='eallende' group by tiempo;
        $this->db->select('usuario,tiempo,SUM(consumo) AS suma');
        $this->db->where('usuario=' . '\'' . $nombre . '\'');
        $this->db->group_by('tiempo');
        $query = $this->db->get('totales_full');
        $result_array = $query->result_array();
        return $result_array;
    }

    public function consumoAsignado($usuario) {
        //select * from squid_log_db.usuarios where usuario='marino';
        $this->db->select('*');
        $this->db->where('usuario=' . '\'' . $usuario . '\'');
        $query = $this->db->get('usuarios');
        return $query->result_array();
    }

    public function datosPorDia($dia, $usuario) {
        // $query = "SELECT client_src_ip_addr, request_url, reply_size/1048576 AS reply_size FROM full_log_2017_03_16 WHERE username = 'david.montero' ORDER BY reply_size DESC ";
        $this->db->select('client_src_ip_addr, request_url, sum(reply_size) as reply_size ');
        $this->db->where('username=' . '\'' . $usuario . '\'');
        $this->db->group_by("request_url,reply_size");
        $query = $this->db->get('full_log_' . $dia);
        $result_array0 = $query->result_array();

        return $result_array0;
    }

    public function UsuarioLog($usuario, $fecha) {
        $this->db->where('username', $usuario);
        echo $this->db->delete('full_log_' . $fecha);
    }

}
