<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class m_table_report extends CI_Model {
    public function __constructor(){
        parent::__constructor();
      
    }
    function fetch_table_report(){
        // $query = $this->db->get("prison");
        $query = $this->db->query("select * from prison 
        join prefix
        on prefix.pre_id = prison.pre_id
        join places
        on prison.pl_id = places.pl_id
        ");
        return $query;
    }

    
}
?>