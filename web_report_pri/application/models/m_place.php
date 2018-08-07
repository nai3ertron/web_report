<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class m_place extends CI_Model {
    public function __constructor(){
        parent::__constructor();
      
    }
    function fetch_place($lat,$lon){
        // $query = $this->db->get("prison");
        $this->db->select("*");
        $this->db->from("places");
        if($lat != '' && $lon != ''){
            $this->db->like('lat',$lat);
            $this->db->or_like('lon',$lon);
        }
        $this->db->order_by('place_id');
        return $this->db->get();
    }

    
}
?>