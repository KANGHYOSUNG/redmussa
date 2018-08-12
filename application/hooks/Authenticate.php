<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Authenticate {

    function __construct() {
        $_ci =& get_instance();
        $this->_ci = $_ci;
        if(!isset($this->_ci->session)) {
              $this->_ci->load->library('session');
        }
    }

   function loginCheck() {
        if($this->_ci->session->userdata) {
            if($this->_ci->session->userdata('uid') != "admin") {
                echo "Valid User";
            }
        }
    }
}
