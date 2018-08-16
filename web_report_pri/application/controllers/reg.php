<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class reg extends CI_Controller{


  function __construct(){
		parent::__construct();
  $this->load->library('encryption');

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
      $password = password_hash($password, PASSWORD_DEFAULT);
       $this->load->model('m_reg','mgd');

       $mgd = $this->mgd;

       $mgd->username = $username;
       $mgd->password = $password;

       $mgd = $this->mgd;
      if($mgd->isExist($_POST['username'])){

?>
<script type="text/javascript">
var alertMsg = "<?php echo $username ?>";
alert("This username("+alertMsg+") is already exist");
window.location.href = "http://localhost/web_report/web_report_pri/reg";
</script>
<?php    }else{

        $mgd->insert();
        header("Location: http://localhost/web_report/web_report_pri/c_login");
      }


  }

}
?>
