<?php
    include('header.php');
?>
<div class="container" style="margin-top:3%">
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive-md">
            <table class="table text-center" id="test_data">
                <thead>
                    <tr>
                        <th style="width: 3%">ลำดับ</th>
                        <th style="width: 10%">ชื่อ</th>
                        <th style="width: 10%">นามสกุล</th>
                        <th style="width: 10%">พิกัด</th>
                    </tr>
                </thead>
            <tbody>
            <?php 
                if($fetch_table->num_rows() > 0){
                    foreach ($fetch_table->result() as $row) {
                        // print_r($row);
            ?>
                        <tr>
                            <td><?php echo $row->ps_id; ?></td>
                            <td><?php echo $row->pre_name." ".$row->ps_name; ?></td>
                            <td><?php echo $row->ps_surname; ?></td>
                            <td><?php echo $row->place_name." (".$row->lat.",".$row->lon.")"; ?></td>
                            <!-- <td> -->
                                <!-- <form > -->
                                    <!-- <div class="row">
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <input class="form-control" id="lat" name="lat" type="text" placeholder="latitude"/>
                                            </div>
                                        </div>
                                        <div class="col-md-3 ">
                                            <div class="form-group">
                                                <input class="form-control" id="lon"  name="lon" type="text" placeholder="longitude"/>
                                            </div>                           
                                        </div>
                                        <div class="col-md-3">
                                            <div class="form-group">
                                                <button class=" btn btn-secondary" id="search" >ค้นหา</button>
                                            </div>                           
                                        </div>
                                    </div> -->
                                <!-- </form> -->
                            <!-- </td> -->
                        </tr>
            <?php
                    }

                }else{
            ?>
                    <tr>
                        <td colspan="3"> Data not found !! </td>
                    </tr>
            <?php  
                    
                }
            ?>
            
            </tbody>
            </table>
            <div class="row" id="show_report">

            </div>
            
        </div>
    </div>
    <!-- <div class="col-md-6">
        <input type="text" name="lat"id="lat" />
        <input type="text" name="lon" id="lon" />
        <button class="btn btn-outline-success" id="search">search</button>
    </div> -->
    <div class=" col-md-12 pull-center" style="margin-top: 3%; margin-bottom:3%">
        <iframe style="width:100%; height:550px; border:none;" src="http://localhost/web_report/web_report_pri/test_view"></iframe>
    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // alert();
    // console.log("HELLO");
    $('#test_data').DataTable();
    // load_place_data();
    // function load_place_data(lat,lon){
    //     $.ajax({
    //         url:"http://localhost/web_report/web_report_pri/c_place/fetch",
    //         method:"POST",
    //         data:{lat:lat,lon:lon},
    //         success:function (data) {
    //             $('#show_report').html(data);
               
    //         }
    //     });
    // }
    // $('#search').click(function () {
    //     var lat = $("input[name=lat]").val();
    //     var lon = $("input[name=lon]").val();

    //     console.log(lat);
    //     console.log(lon);

    //     // var lat ;
    //     if(lon != '' && lat != ''){
    //         load_place_data(lat,lon);
    //     }else{
    //         load_place_data();
    //     }
    // })
});
</script>
