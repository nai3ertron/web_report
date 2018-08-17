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
    }
    function loadDataReport(){
        $sql = $this->db->query("select * from places")->result();
        echo json_encode($sql);
    }
    
    function loadPrisonLatLng(){
        $sql = $this->db->query("select ps_name,ps_surname,places.lat,places.lon,places.pl_id,ps_id from prison
        join places on places.pl_id = prison.pl_id
        ")->result();
        echo json_encode($sql);
    }

    // function loadReport($check){
    //   $data = $this->load->model("m_table_report");
    //    echo $check;
    //    if($data->num_rows() > 0){
    //         foreach ($data->result() as $row) {
    //             // if($row->lat == $lat & $row->lon == $lon){
    //                 // if($check){
    //                 //     $temp = "true";
    //                 // }else{
    //                 //     $temp = "false";
    //                 // }
    //                 $output .= '<tr>
    //                 <td><?php '.$row->ps_id.'</td>
    //                 <td><?php '.$row->pre_name." ".$row->ps_name.'</td>
    //                 <td><?php  '.$row->ps_surname.'</td>
    //                 <td class="text-left">'.  $row->pl_name.'</td>
    //                 <td class="text-left"> '.$row->lat.", ".$row->lon .'</td>
    //                 <td > '."true".'</td>
    //             </tr> 
    //                 ';
    //             // }else{
    //                 // $output .= '
    //                 //     <div class="text-center">
    //                 //         <ul>Not found ! please check your lat & lng</ul>
    //                 //     </div>';
    //                 //     break;
    //             // }
    //         }
    //     }else{
    //         $output .= '
    //         <div>
    //         <ul>Not found</ul>
    //     </div>';
    //     }
    //     echo $output;

    // }

    
}
?>