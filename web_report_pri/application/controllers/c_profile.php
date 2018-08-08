<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_profile extends CI_Controller{


  function __construct(){
		parent::__construct();
      $this->load->library('session');

	}
     public function index(){
        $data['title'] = "Profile";
        $this->load->view('header',$data);
        $this->load->view('v_profile');
        $this->load->view('footer');
     }
   }
   ?>
