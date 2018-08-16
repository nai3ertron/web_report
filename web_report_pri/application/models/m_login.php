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


     public function get_user($username){

       $sql="SELECT * FROM users WHERE username = '$username' ";


       $result = $this->db->query($sql);
       return $result;


     }

    public function check_login($username,$password){
      $this->username = $username;
        $this->password = $password;

        $key="SELECT password FROM users WHERE username = '$username' ";
        $row= $this->db->query($key)->row_array();

    $hash=$row['password'];
   $hash = substr( $hash, 0, 60 );
        if(password_verify($password,$hash)){

      $sql="SELECT * FROM users WHERE username = '$username' AND password ='$hash';";
      $query = $this->db->query($sql);

   if($query->num_rows()>0){
        return true;
    }

  }else{
    return false;
  }
}

}

?>
