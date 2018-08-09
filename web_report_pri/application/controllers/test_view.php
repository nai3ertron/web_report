<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class test_view extends CI_Controller{
     public function index(){
         $data['title'] = 'Maps';
        $this->load->view('test_map',$data);
     }

    
}
?>