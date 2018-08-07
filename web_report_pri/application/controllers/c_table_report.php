<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class c_table_report extends CI_Controller {
    
    public function __constructor(){
        parent::__constructor();
    }
    public function index(){
        // title name page
        $data['title'] = "Report Table";
        
        // load model
        $this->load->model("m_table_report");
        $data["fetch_table"] = $this->m_table_report->fetch_table_report();
        $this->load->view("table_report",$data);
     }

    
}
?>