<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_table_report extends CI_Model {
    public function __constructor(){
        parent::__constructor();
      
    }
     public function index(){
        $this->load->view('table_report');
     }

    
}
?>