<?php
require_once(APPPATH.'models\ModelOOP.php');
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Mac extends ModelOOP {
    var $ip;
    var $mac;
    var $descrption;
}
