<?php

require_once(APPPATH . 'models\mac.php');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('masvistadas_model');
        $this->load->model('Usuario_model');
        $this->load->model('Dominio_model');
        $this->load->model('Networks_model');
        $this->load->model('Consultas_model');

        $this->load->helper(array('html', 'url'));
        $this->load->library('session');
    }

    function consumoUsuario() {
        $c = new Usuario_model();

        $usuario = $this->session->all_userdata();
////        if ($usuario['logged_in'] != TRUE) {
////            $this->session->sess_destroy();
////            redirect("Welcome/login");
////        }
        $data['datos'] = $c->consumo_usuario($usuario['nombre']);
        $data['cuota'] = $c->consumoAsignado($usuario['nombre']);
        $data['nombre'] = $usuario['nombrecompleto'];
        $data['menss'] = "";
        if (count($data['cuota']) == 0) {
            $data['menss'] = "Usted no tiene registros de navegación";
        }

        $this->load->view('ConsumoReportes/consumoDelUsuario', $data);
    }

    function consumoUsuarioAdmin() {
        $c = new Usuario_model();
        $usuario = $this->session->all_userdata();
//        if ($usuario['logged_in'] != TRUE) {
//            $this->session->sess_destroy();
//            redirect("Welcome/login");
//        }
        $data['datos'] = $c->consumo_usuario($usuario['nombre']);
        $data['cuota'] = $c->consumoAsignado($usuario['nombre']);
        $data['nombre'] = $usuario['nombrecompleto'];

        $this->load->view('Admin/adminReportes', $data);
    }

    function datosPorDia() {
        if ($this->input->post()) {
            $dia1 = $this->input->post('tiempo');
            $split = split("-", $dia1);
            $d = $split[0] . "_" . $split[1] . "_" . $split[2];
            $usuario = $this->session->all_userdata();
            $c = new Usuario_model();
            $usuario = $this->session->all_userdata();
            $data['nombre'] = $usuario['nombrecompleto'];
            $data['navegacion'] = $c->datosPorDia($d, $usuario['nombre']);
            $this->load->view('ConsumoReportes/datosPorDia', $data);
        }
    }

//    function filtrado_usuario() {
//        $red = new Networks_model();
//        $data['redes'] = $red->get_all();
//        if ($this->input->is_ajax_request()) {
//            $usuario = $this->input->post('usuario');
//            $dominio = $this->input->post('dominio');
//            $red = $this->input->post('red');
//            $computadora = $this->input->post('computadora');
//            $dia1 = $this->input->post('dia1');
//            $dia2 = $this->input->post('dia2');
//            $c = new Usuario_model();
//            $data['datos'] = $c->consumo_usuario_fecha($dia1, $dia2, $usuario);
//            $data['cuota'] = $c->consumoAsignado($usuario);
//            $this->load->view('ConsumoReportes/ConsumoUsuario', $data);
//        }
//    }
//
//    function com_mas_consumo() {
//        $red = new Networks_model();
//        $data['redes'] = $red->get_all();
//        if ($this->input->is_ajax_request()) {
//            $dia1 = $this->input->post('dia1');
//            $dia2 = $this->input->post('dia2');
//            $c = new Usuario_model();
//            $data['datos'] = $c->comMasConsumo($dia1, $dia2);
//            $this->load->view('Graficas/GraficaUsuario', $data);
//        }
//    }
//
//    function consumo_criterios() {
//        $red = new Networks_model();
//        $data['redes'] = $red->get_all();
//        if ($this->input->is_ajax_request()) {
//            $usuario = $this->input->post('usuario');
//            $dominio = $this->input->post('dominio');
//            $red = $this->input->post('red');
//            $computadora = $this->input->post('computadora');
//            $dia1 = $this->input->post('dia1');
//            $dia2 = $this->input->post('dia2');
//            $c = new Usuario_model();
//            $data['datos'] = $c->consumoCriterios($dia1, $dia2, $computadora, $usuario, $dominio, $red);
//            //if($data['datos'][0]['suma']==0){
//            //    $this->load->view('ConsumoReportes/NoDatos', $data);
//            // }
//            // else
//            $this->load->view('ConsumoReportes/ConsumoUsuario', $data);
//        }
//    }
//

    function consumoUsuarioIntranet() {
        $c = new Usuario_model();
        $usuario = $this->uri->segment(3);
        //    $usuario = $this->encriptar("david.montero");
        //   $usuario = $this->desencriptar($usuario);
////        if ($usuario['logged_in'] != TRUE) {
////            $this->session->sess_destroy();
////            redirect("Welcome/login");
////        }
        $data['datos'] = $c->consumo_usuario($usuario);
        $data['cuota'] = $c->consumoAsignado($usuario);
        $data['nombre'] = $usuario['nombrecompleto'];

        $this->load->view('ConsumoReportes/consumointranet', $data);
    }

    function desencriptar($cadena) {
        $key = '$1naV*';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $decrypted = rtrim(mcrypt_decrypt(MCRYPT_RIJNDAEL_256, md5($key), base64_decode($cadena), MCRYPT_MODE_CBC, md5(md5($key))), "\0");
        return $decrypted;  //Devuelve el string desencriptado
    }

    function encriptar($cadena) {
        $key = '$1naV*';  // Una clave de codificacion, debe usarse la misma para encriptar y desencriptar
        $encrypted = base64_encode(mcrypt_encrypt(MCRYPT_RIJNDAEL_256, md5($key), $cadena, MCRYPT_MODE_CBC, md5(md5($key))));
        return $encrypted; //Devuelve el string encriptado
    }

    public function consumo28() {
        $c = new Usuario_model();
        $usuario = $this->session->all_userdata();
        $data['datos'] = $c->consumo_usuario_28($usuario['nombre']);

        $data['nombre'] = $usuario['nombrecompleto'];
        echo 'asdasdadasd';
        $this->load->view('ConsumoReportes/consumoDelUsuario28', $data);
    }

    function UsuarioLog() {
//        $c = new Usuario_model();
//        $usuario = $this->uri->segment(3);
//        $fecha = $this->uri->segment(4);
//        $c->UsuarioLog($usuario, $fecha);
//
//        $this->load->view('ConsumoReportes/consumointranet', $data);
    }

}
