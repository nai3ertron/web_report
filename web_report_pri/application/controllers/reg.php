<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reg extends CI_Controller{


  function __construct(){
		parent::__construct();


	}
     public function index(){
        $data['title'] = "Register";
        $this->load->view('header',$data);
        $this->load->view('v_reg');
        $this->load->view('footer');
     }

     public function register(){


       $username=$this->input->post('username');
       $password=$this->input->post('password');

       $this->load->model('m_reg','mgd');

       $mgd = $this->mgd;

       $mgd->username = $username;
       $mgd->password = $password;

       $mgd = $this->mgd;
      if($mgd->isExist($_POST['username'])){
    ?>
    <script>
  alert("Username already exists");
  </script>

<?php
      }else{

        $mgd->insert();
        header("Location: http://localhost/web_report/web_report_pri/c_login");
      }


  }

}
?>
