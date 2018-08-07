<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class c_place extends CI_Controller {
    
    public function __constructor(){
        parent::__constructor();
    }
    public function index(){
        // title name page
        $data['title'] = "Report Table";
        $this->load->model("m_table_report");
        $data["fetch_table"] = $this->m_table_report->fetch_table_report();
        $this->load->view("table_report",$data);
    }
    function fetch(){
        $output = "";
        $lat = "";
        $lon = "";
        // load model
        $this->load->model("m_place");
        if($this->input->post('lat') && $this->input->post('lon')){
            $lat = $this->input->post('lat');
            $lon = $this->input->post('lon');
           // echo " พิกัด = lat: ".$lat.", lon: ".$lon;
        }
        $data = $this->m_place->fetch_place($lat,$lon);
            if($data->num_rows() > 0){
                foreach ($data->result() as $row) {
                    // $output .='<div>
                    // name :'.$row->place_name.'
                    // lat :'.$row->lat.'
                    // lon :'.$row->lon.'
                    // </div>';
                    $output .= ' 
                        <div class="card mr-2 ml-2 mt-2" style="width: 18rem;">
                            <div class="card-body">
                                <h5 class="card-title">ชื่อคน</h5>
                            </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">'.$row->place_name.'</li>
                                    <li class="list-group-item">'.$row->lat.'</li>
                                    <li class="list-group-item">'.$row->lon.'</li>
                                </ul>
                            <div class="card-body">
                            </div>
                        </div>';

                }
            }else{
             $output .= '
             <div>
                <ul>Not found</ul>
            </div>';
            }
            echo $output;
    } 
}
?>