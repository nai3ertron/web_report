
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller{


  function __construct(){
		parent::__construct();
      $this->load->library('session');
      $this->load->library('encryption');

$this->load->library('form_validation');

	}
     public function index(){
        $data['title'] = "Login";
        $this->load->view('header',$data);
        $this->load->view('v_login');
        $this->load->view('footer');
     }

   public function authen(){
     $username = $this->input->post('username');

   $password = $this->input->post('password');


    $this->load->model('m_login','mgd');
    $mgd = $this->mgd;

    $mgd->username = $username;
    $mgd->password = $password;

    $mgd = $this->mgd;

    $query= $mgd->get_user($username);
    if($mgd->check_login($username,$password)){
      $row = $query->row(1);
      $data = array(
                'user_id'           => $row->user_id,
                'username'        => $row->username,
                'password'      => $row->password,
              );


      $this->session->set_userdata($data);
      $var = $this->session->userdata;
            session_write_close();
      header("Location: http://localhost/web_report/web_report_pri/c_profile");

    }else{
echo ("<script >
 alert('username or password is incorrect');
window.location.href='http://localhost/web_report/web_report_pri/c_login';
</script>");

    }


   }

   public function logout(){

     $this->session->unset_userdata('user_id');
     $this->session->unset_userdata('username');
     $this->session->unset_userdata('password');
     $this->session->sess_destroy();
  
 }



}
?>
