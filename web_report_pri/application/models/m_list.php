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
     public function insert($pl_name){
      if($this->checkplace($pl_name)){
$pl_id=$this->get_place($pl_name);
$sql="INSERT INTO prison (pre_id,ps_name,ps_surname,pl_id) VALUES (?,?,?,?);";
$this->db->query($sql,array($this->pre_id,$this->ps_name,$this->ps_surname,$pl_id));

      }
     else{
       $sql = "INSERT INTO places (pl_name,lat,lon) VALUES (?,?,?);";
       $this->db->query($sql,array($this->pl_name,$this->lat,$this->lon));

  $lastid = $this->db->insert_id();

       $sql2="INSERT INTO prison (pre_id,ps_name,ps_surname,pl_id) VALUES (?,?,?,?);";
      $this->db->query($sql2,array($this->pre_id,$this->ps_name,$this->ps_surname,$lastid));
    }



     }


     public function checkplace($pl_name){
       $this->db->where('pl_name' , $pl_name);
       $query = $this->db->get('places');
       if($query->num_rows()>0){
         return true;
        } else {
          return false;
        }

     }

     public function get_place($pl_name){

              $sql="SELECT pl_id FROM places WHERE pl_name = '$pl_name' ";
              $result = $this->db->query($sql)->row();
              return $result->pl_id;

     }




   }
?>
