<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller{
     public function index(){
        $data['title'] = "HOME PAGE";
        $this->load->view('header',$data);
        $this->load->view('main_view');
        $this->load->view('footer');
     }

    
}
?>