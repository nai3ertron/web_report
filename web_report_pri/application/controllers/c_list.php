<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_list extends CI_Controller{


  function __construct(){
		parent::__construct();

      $this->load->library('session');


	}
     public function index(){

               $this->load->model('m_list','ml');

         			$ml= $this->ml;
         			$data['rs_all'] = $ml->get_all();
              $data['pref'] = $ml->get_pre();

        $data['title'] = "Prison Information List";
        $this->load->view('v_list',$data);
     }

   public function ps_insert(){
     $prefix=$this->input->post('prefix');
     $ps_name=$this->input->post('ps_name');
      $ps_surname=$this->input->post('ps_surname');
       $ps_name=$this->input->post('ps_name');
       $pl_name=$this->input->post('pl_name');
       $lat=$this->input->post('lat');
       $lon=$this->input->post('lon');

   }
 }

?>
