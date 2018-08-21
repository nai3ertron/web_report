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

        $this->load->view('header',$data);

        $this->load->view('v_list',$data);
        $this->load->view('footer');
     }

   public function ps_insert(){
     $pre_id=$this->input->post('pre_id');
     $ps_name=$this->input->post('ps_name');
      $ps_surname=$this->input->post('ps_surname');

       $pl_name=$this->input->post('pl_name');
       $lat=$this->input->post('lat');
       $lon=$this->input->post('lon');
       $this->load->model('m_list','ml');

       $ml= $this->ml;


       $ml->pre_id =  $pre_id;
       $ml->ps_name = $ps_name;
        $ml->ps_surname = $ps_surname;
         $ml->pl_name = $pl_name;
        $ml->lat = $lat;
          $ml->lon = $lon;
       $ml = $this->ml;



      $ml->insert($pl_name);

       header("Location: http://localhost/web_report/web_report_pri/c_list");

   }
 }

?>
