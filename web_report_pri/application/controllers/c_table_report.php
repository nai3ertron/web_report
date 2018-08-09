<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class c_table_report extends CI_Controller {
    
    public function __constructor(){
        parent::__constructor();
        
    }
    public function index(){
        // title name page
        $data['title'] = "Report Table";
        
        // load model
        $this->load->model("m_table_report");
        $data["fetch_table"] = $this->m_table_report->fetch_table_report();
        $this->load->view("table_report",$data);

        // $countries = $this->European_countries_model->get_countries(); 
        // $data['countries'] = $countries;

        // $response = array();
        // $posts = array();
        // foreach ($countries as $country) { 
        //     $posts[] = array(
        //         "title"                 =>  $country->euro_id,
        //         "flag"                  =>  $country->flag_name,
        //         "population"            =>  $country->population,
        //         "avg_annual_gcountryth" =>  $country->avg_annual_gcountryth,
        //         "date"                  =>  $country->date
        //     );
        // } 
        // $response['posts'] = $posts;
        // echo json_encode($response,TRUE);
    }
    function loadDataReport(){
        $sql = $this->db->query("select * from prison 
            join prename 
            on prename.pre_id = prison.pre_id
            join places
            on prison.ps_pl_id = places.place_id
            ")->result();
        echo json_encode($sql);
    }
     

    
}
?>