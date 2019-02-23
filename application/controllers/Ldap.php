<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Ladp extends CI_Controller {

    public function index() {
      login();
    }

    //se encarga del logeo del usuario
  public  function login() {
        $nombre = $this->input->post('nombre');
        $contrasena = $this->input->post('contrasena');
        $servidor_LDAP = "10.30.1.48";
        $servidor_dominio = "uo.edu.cu";
        $ldap_dn = "dc=uo,dc=edu,dc=cu";
        $usuario_LDAP = $nombre;
        $contrasena_LDAP = $contrasena;
        define(LDAP_OPT_DIAGNOSTIC_MESSAGE, 0x0032);
        $conectado_LDAP = ldap_connect($servidor_LDAP);
        ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);
        if ($conectado_LDAP) {
            $autenticado_LDAP = ldap_bind($conectado_LDAP, $usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);
            if ($autenticado_LDAP) {
                if ($group)
                    $query = "(&";
                else
                    $query = "";

                $query .= "(&(objectClass=user)(objectCategory=person))";

                // Filter by memberOf, if group is set
                if (is_array($group)) {
                    // Looking for a members amongst multiple groups
                    if ($inclusive) {
                        // Inclusive - get users that are in any of the groups
                        // Add OR operator
                        $query .= "(|";
                    } else {
                        // Exclusive - only get users that are in all of the groups
                        // Add AND operator
                        $query .= "(&";
                    }

                    // Append each group
                    foreach ($group as $g)
                        $query .= "(memberOf=CN=$g,$ldap_dn)";

                    $query .= ")";
                } elseif ($group) {
                    // Just looking for membership of one group
                    $query .= "(memberOf=CN=$group,$ldap_dn)";
                }

                // Close query
                if ($group)
                    $query .= ")";
                else
                    $query .= "";

                // Uncomment to output queries onto page for debugging
                // print_r($query);
                // Search AD
                $results = ldap_search($ldap, $ldap_dn, $query);
                $entries = ldap_get_entries($ldap, $results);

                // Remove first entry (it's always blank)
                array_shift($entries);

                $output = array(); // Declare the output array

                $i = 0; // Counter
                // Build output array
                foreach ($entries as $u) {
                    foreach ($keep as $x) {
                        // Check for attribute
                        if (isset($u[$x][0]))
                            $attrval = $u[$x][0];
                        else
                            $attrval = NULL;

                        // Append attribute to output array
                        $output[$i][$x] = $attrval;
                    }
                    $i++;
                }

                return $output;
            }

// Example Output

            print_r(get_members()); // Gets all users in 'Users'

            print_r(get_members("Test Group")); // Gets all members of 'Test Group'

            print_r(get_members(
                            array("Test Group", "Test Group 2")
            )); // EXCLUSIVE: Gets only members that belong to BOTH 'Test Group' AND 'Test Group 2'

            print_r(get_members(
                            array("Test Group", "Test Group 2"), TRUE
            )); // INCLUSIVE: Gets members that belong to EITHER 'Test Group' OR 'Test Group 2'
        }
         else {
            $data['error'] = "Usuario o Contraseña Incorrectos";

            $this->load->view('welcome_message', $data);
        }
    }

    public function cerrarSesion() {
        $this->session->sess_destroy();
        redirect();
    }

    //metodo llamado desde la vista
    function cambiarContrasena() {
        if ($this->input->post()) {
            $nombre = $this->input->post('nombre');
            $contrasena = $this->input->post('contrasena');
            $nuevacontrasena = $this->input->post('nuevacontrasena');
            $nueva2contrasena = $this->input->post('nueva2contrasena');
            $error_clave = "";
            if ($this->validarUsuarioContrasena($nombre, $contrasena)) {

                if ($nuevacontrasena != $nueva2contrasena) {
                    $data['error'] = "No Coinciden las Contraseñas";
                    $data['nombre'] = $nombre;
                    $this->load->view('cambiarContrasena', $data);
                } else {
                    $passValidar = $this->validarContrasena($nueva2contrasena);
                    if ($passValidar != " ") {
                        $data['error'] = $passValidar;
                        $data['nombre'] = $nombre;
                        $this->load->view('cambiarContrasena', $data);
                    } else {
                        $this->changePassLDAP($nombre, $nuevacontrasena);
                        redirect();
                    }
                }
            } else {
                $data['error'] = "La Antigua Contraseña no es Correcta";
                $data['nombre'] = $nombre;
                $this->load->view('cambiarContrasena', $data);
            }
        } else {
            $this->load->view('cambiarContrasena', $data);
        }
    }

    //cambiar la contraseña
    function changePassLDAP($user, $new_pass) {
        $ldap_connection = ldap_connect("10.30.1.48");
        $adminUser = "passwdAD";
        $adminPass = "";
        ldap_set_option($ldap_connection, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($ldap_connection, LDAP_OPT_REFERRALS, 0);
        if ($ldap_connection) {
            $bind = ldap_bind($ldap_connection, $adminUser . '@' . 'uo.edu.cu', $adminPass);
            if (!$bind) {
                @ldap_close($ldap_connection);
            }
        }
        if ($ldap_connection) {
            $filter = "(sAMAccountName=$user)";
            $result = ldap_search($ldap_connection, 'dc=uo,dc=edu,dc=cu', $filter);
            ldap_sort($ldap_connection, $result, "sn");
            $info = ldap_get_entries($ldap_connection, $result);
            $isLocked = $info[0]["lockoutTime"];
            if ($isLocked > 0) {
                echo 'Cuenta bloqueada, póngase en contacto con su administrador.';
            }
            $userDn = $info[0]["distinguishedname"][0];
            $userdata["unicodePwd"] = iconv("UTF-8", "UTF-16LE", '"' . $new_pass . '"');
            //Para proveer de navegacion en internet al usuario
            $realm = 'Proxy UOnet';
            $userdata["description"] = "$realm:" . md5("$user:$realm:$new_pass");

            $result = ldap_mod_replace($ldap_connection, $userDn, $userdata);
            if (!$result) {
                echo "$ldap_connection";
            }
        } else {
            echo "Usuario administrador incorrecto";
        }
        @ldap_close($ldap_connection);
    }

    //validacion de los carfacter de la contraseña
    function validarContrasena($clave) {
        if (strlen($clave) < 6) {
            $error_clave = "La clave debe tener al menos 6 caracteres";
            return $error_clave;
        }
        if (strlen($clave) > 16) {
            $error_clave = "La clave debe tener menos de 16 caracteres";
            return $error_clave;
        }
        if (!preg_match('`[a-z]`', $clave)) {
            $error_clave = "La clave debe tener al menos una letra minúscula";
            return $error_clave;
        }
        if (!preg_match('`[A-Z]`', $clave)) {
            $error_clave = "La clave debe tener al menos una letra mayúscula";
            return $error_clave;
        }
        if (!preg_match('`[0-9]`', $clave)) {
            $error_clave = "La clave debe tener al menos un caracter numérico";
            return $error_clave;
        }
        $error_clave = " ";
        return $error_clave;
    }

    //Esta funcion toma el nombre del usuario en el ldpa
    function getDN($ad, $samaccountname, $basedn) {
        $attributes = array('dn');
        $result = ldap_search($ad, $basedn, "(samaccountname={$samaccountname})", $attributes);

        if ($result === FALSE) {
            return '';
        }
        $entries = ldap_get_entries($ad, $result);
        if ($entries['count'] > 0) {
            return $entries[0]['dn'];
        } else {
            return '';
        }
    }

    //se encarga del logeo del usuario
    function loginadmin() {
        if ($this->input->post()) {
            $nombre = $this->input->post('nombre');
            $newdata = array(
                'nombre' => $nombre,
                'nombrecompleto' => $nombre,
                'logged_in' => TRUE
            );
            $this->session->set_userdata($newdata);
            redirect("Usuario/consumoUsuario");
        } else {
            $data['error'] = "Usuario o Contraseña Incorrectos";
            $data['nombre'] = $nombre;
            $this->load->view('admin', $data);
        }
    }

    public function tipoDeUsuario($conectado_LDAP, $userdn, $ldap_dn) {
        if ($this->checkGroupUser($conectado_LDAP, $userdn, $this->getDN($conectado_LDAP, "Internet", $ldap_dn))) {
            $sr = ldap_search($conectado_LDAP, $userdn, "cn=*");
            $info = ldap_get_entries($conectado_LDAP, $sr);   //Datos del usuario que se autentica
            //Se determina a que grupo pertenece el usuario para determinar el tamaño de la cuota
            if ($this->checkGroupEx($conectado_LDAP, $userdn, $this->getDN($conectado_LDAP, "AdminAreas", $ldap_dn))) {
                return "Administrador";
            } elseif ($this->checkGroupEx($conectado_LDAP, $userdn, $this->getDN($conectado_LDAP, "Profesores", $ldap_dn))) {
                return "Profesor";
            } elseif ($this->checkGroupEx($conectado_LDAP, $userdn, $this->getDN($conectado_LDAP, "Trabajadores", $ldap_dn))) {
                return "Trabajador";
            } elseif ($this->checkGroupEx($conectado_LDAP, $userdn, $this->getDN($conectado_LDAP, "Estudiantes", $ldap_dn))) {
                return "Estudiante";
            }
        } else {
            return "Nada";
        }
    }

    public function checkGroupUser($ad, $userdn, $groupdn) {
        $attributes = array('memberof');
        $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
        if ($result === FALSE) {
            return FALSE;
        }
        $entries = ldap_get_entries($ad, $result);
        if ($entries['count'] <= 0) {
            return FALSE;
        }
        if (empty($entries[0]['memberof'])) {
            return FALSE;
        }
        return TRUE;
    }

    public function getNumberString($string) {
        $numeros = ereg_replace("[^0-9]", "", $string);
        $posIni = strpos($string, "gb");
        if ($posIni !== false) {
            $numeros = $numeros * 1024;
        }

        return $numeros;
    }

    public function checkGroupEx($ad, $userdn, $groupdn) {
        $attributes = array('memberof');
        $result = ldap_read($ad, $userdn, '(objectclass=*)', $attributes);
        if ($result === FALSE) {
            return FALSE;
        };
        $entries = ldap_get_entries($ad, $result);
        if ($entries['count'] <= 0) {
            return FALSE;
        };
        if (empty($entries[0]['memberof'])) {
            return FALSE;
        } else {
            for ($i = 0; $i < $entries[0]['memberof']['count']; $i++) {
                if ($entries[0]['memberof'][$i] == $groupdn) {
                    return TRUE;
                } elseif ($this->checkGroupEx($ad, $entries[0]['memberof'][$i], $groupdn)) {
                    return TRUE;
                };
            };
        };
        return FALSE;
    }

    function process_si_contact_form() {
        //  $this->load->library('session');
        //  if (sizeof($errors) == 0) 
        if ($this->input->is_ajax_request()) {
            $ct_captcha = $this->input->post('ct_captcha');
            require_once 'scripts/securimage.php';
            $securimage = new Securimage();
            echo $ct_captcha;
            if ($securimage->check($ct_captcha) == false) {
                echo 'captcha contiene un error';
                echo 'No Error';
            }
        }

//       if (sizeof($errors) == 0) {
//            echo 'No Error';
//            $newdata = array(
//                'nombre' => 'david.montero',
//                'logged_in' => TRUE
//            );
//            $this->session->set_userdata($newdata);
//            redirect("Usuario/consumoUsuario");
//        } else {
//            echo 'Usuario O contraseña Incorrectos'.$error;
//            
//        }
    }

    //valida que el usuario y la contraseña son correctos
    function validarUsuarioContrasena($nombre, $contrasena) {
        $servidor_LDAP = "10.30.1.48";
        $servidor_dominio = "uo.edu.cu";
        $ldap_dn = "dc=uo,dc=edu,dc=cu";
        $usuario_LDAP = $nombre;
        $contrasena_LDAP = $contrasena;
        define(LDAP_OPT_DIAGNOSTIC_MESSAGE, 0x0032);
        $conectado_LDAP = ldap_connect($servidor_LDAP);
        ldap_set_option($conectado_LDAP, LDAP_OPT_PROTOCOL_VERSION, 3);
        ldap_set_option($conectado_LDAP, LDAP_OPT_REFERRALS, 0);
        if ($conectado_LDAP) {
            $autenticado_LDAP = ldap_bind($conectado_LDAP, $usuario_LDAP . "@" . $servidor_dominio, $contrasena_LDAP);
            if ($autenticado_LDAP) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

}


