<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_reg extends CI_Model {

  public $username;
    public $password;

    public function __constructor(){
        parent::__constructor();

    }
     public function index(){
        $this->load->view('v_reg');
     }

    public function isExist($username){

      $this->db->where('username' , $username);
   $query = $this->db->get('users');
   if($query->num_rows()>0){
     return true;
    } else {
      return false;
    }

}


    public function insert(){
     $sql = "INSERT INTO users (username,password) VALUES (?,?);";
     $this->db->query($sql,array($this->username,$this->password));

   }

}
?>
