<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Logged_Validation extends CI_Controller{
    function __construct() {
        parent::__construct();
        if ( !$this->session->userdata('loggin')){ 
            redirect('home', 'refresh');
        }
    }
}
?>
