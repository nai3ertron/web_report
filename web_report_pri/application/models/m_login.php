<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_login extends CI_Model {

  public $username;
    public $password;

    public function __constructor(){
        parent::__constructor();

    }
     public function index(){
        $this->load->view('v_login');
     }


     public function get_user($username,$password){
       $sql="SELECT * FROM users WHERE username = '$username' AND password ='$password'";
       $result = $this->db->query($sql);
       return $result;


     }

    public function check_login($username,$password){
      $this->username = $username;
        $this->password = $password;
      $sql="SELECT * FROM users WHERE username = '$username' AND password ='$password'";
      $query = $this->db->query($sql);

   if($query->num_rows()>0){
        return true;
    }
    else{

      return false;
    }
}

}

?>
