<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class m_list extends CI_Model {



    public function __constructor(){
        parent::__constructor();

    }

    public function index(){
       $this->load->view('v_list');
    }

    public function get_all(){
     $sql="SELECT * FROM prison
     LEFT JOIN  places ON prison.pl_id = places.pl_id
     LEFT JOIN  prefix ON prison.pre_id = prefix.pre_id";
     $result = $this->db->query($sql);
     return $result;


   }
   public function get_pre(){
  $sql="SELECT * FROM prefix" ;

   $result = $this->db->query($sql);
     return $result;
   }
     public function insert(){
       $sql = "INSERT INTO prison (pla,password) VALUES (?,?);";
       $this->db->query($sql,array($this->username,$this->password));
     }


   }
?>
