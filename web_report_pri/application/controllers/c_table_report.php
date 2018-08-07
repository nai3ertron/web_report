<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class c_table_report extends CI_Controller {
    public function __constructor(){
        parent::__constructor();
        $this->load->model();
    }
     public function index(){
        $this->load->view('table_report');
     }

    
}
?>