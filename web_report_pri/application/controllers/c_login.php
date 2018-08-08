<?php /*
session_start();

$link =mysqli_connect("localhost","root","root");

mysqli_select_db("area_report");
$strSQL = "SELECT * FROM users WHERE username = '".mysql_real_escape_string($_POST['user'])."'
and password = '".mysql_real_escape_string($_POST['pass'])."'";

$objQuery = mysql_query($strSQL);

$objResult = mysql_fetch_array($objQuery);
if(!$objResult){
?>
  <script>
    alert("Incorrect");
    </script>
	<?php
}else{
      $_SESSION["user_id"]=$objResult["user_id"];


	   session_write_close();
	   header("location:profile.php");
 }
 mysql_close();
 */
?>

<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class c_login extends CI_Controller{


  function __construct(){
		parent::__construct();
      $this->load->library('session');

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
    if($mgd->check_login($username,$password)){


$this->session->set_userdata('username',$username);
      $var = $this->session->userdata;
      session_write_close();
	   header("location:http://localhost/web_report/web_report_pri/c_profile");

    }else{
echo "Incorrect";


    }

   }

   public function logout(){


   }

}
?>
