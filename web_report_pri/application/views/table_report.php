<?php
    include('header.php');
?>
<div class="container ">

    <div class="table-responsive-md">
        <table class="table table-hover">
            <thead class="text-center">
                <tr>
                    <th >ลำดับ</th>
                    <th >ชื่อ</th>
                    <th >นามสกุล</th>
                    <th >พิกัด</th>
                </tr>
            </thead>
        <tbody>
        <?php 
            if($fetch_table->num_rows() > 0){
                foreach ($fetch_table->result() as $row) {
        ?>
                    <tr>
                        <td><?php echo $row->ps_id; ?></td>
                        <td><?php echo $row->pre_name." ".$row->ps_name; ?></td>
                        <td><?php echo $row->ps_surname; ?></td>
                        <td class="container-fluid">
                            <!-- <form > -->
                                <div class="row">
                                    <div class="col-md-3 col-centered">
                                        <div class="form-group">
                                            <input class="form-control" id="lat" name="lat" type="text" placeholder="latitude" required="required" />
                                        </div>
                                    </div>
                                    <div class="col-md-3  col-centered">
                                        <div class="form-group">
                                            <input class="form-control" id="lon"  name="lon" type="text" placeholder="longtitude" required="required" />
                                        </div>                           
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <button class=" btn btn-secondary" id="search" >ค้นหา</button>
                                        </div>                           
                                    </div>
                                </div>
                            <!-- </form> -->
                        </td>
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

<script type="text/javascript">
$(document).ready(function() {
    // alert();
    // console.log("HELLO");
    load_place_data();
    function load_place_data(lat,lon){
      
        $.ajax({
            url:"http://localhost/web_report/web_report_pri/c_place/fetch",
            method:"POST",
            data:{lat:lat,lon:lon},
            success:function (data) {
                $('#show_report').html(data);
               
            }
        });
    }
    $('#search').click(function () {
        var lat = $("input[name=lat]").val();
        var lon = $("input[name=lon]").val();

        console.log(lat);
        console.log(lon);

        // var lat ;
        if(lon != '' && lat != ''){
            load_place_data(lat,lon);
        }else{
            load_place_data();
        }
    })

});
</script>
