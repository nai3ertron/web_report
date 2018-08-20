<?php
    include('header.php');
      include('footer.php');
    ?>
    <script>
    $(document).ready(function(){




    });
    </script>
<style>
 .psname{
  width:20%;
 }
  .place{
  width:30%;
  }
  .rad{
   width:10%;
  }
  .tt_time{
  width:15%;
  }
  .lf_time{
width:15%;
  }
 .pro{
 width:10%;
 }

 #t_head{

   vertical-align: middle;
   text-align: center;
 }
 .modal {

   position: absolute;
   float: left;
   left: 50%;
   top: 50%;
   transform: translate(-50%, -50%);
   min-height:100%;
   overflow-y: hidden!important;
   width: 1500px; /* respsonsive width */

 }

 .modal-dialog {
    width: 80%;

}
.modal-lg {
    max-width: 50%;
}

</style>

<div class="modal fade " id="insertModal" >
  <div class="modal-dialog modal-lg" >

    <div class="modal-content">
      <div class="modal-header">
          <h2>บันทึกข้อมูลผู้ถูกคุมประพฤติ</h2>
              <button type="button" class="close pull-right" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>

          </div>

          <div class="modal-body">

      <form class="form-horizantal" method="POST" action="/web_report/web_report_pri/c_list/ps_insert">
        <div class="container-fluid">
            <div class="row">
             <div id="pic" class="col-md-3" style=" ">
       <span>รูปภาพ</span>

             </div>
             <div class="col-md-9">
               <label for="ps_id">รหัส:</label>
               <input type="text" class="form-control" id="ps_id" name="ps_id" required>
             </div>
            </div>

            <div class="row">

             <div id="prename" class="col-md-3">

               <label class="control-label" for="pre_id">คำนำหน้า:</label>
                 <select class="form-control " id="pre_id">
                  <?php foreach($pref->result() as $val){?>
                   <option name="pre_name" value="<?php echo $val->pre_id; ?>"><?php echo $val->pre_name; ?></option>
                   <?php } ?>
                 </select>
             </div>

             <div id="name" class="col-md-5">
               <label for="ps_name">ชื่อ:</label>
               <input type="text" class="form-control" id="ps_name" name="ps_name" required>

             </div>

             <div id="surname" class="col-md-4">
               <label for="ps_surname">นามสกุล:</label>
               <input type="text" class="form-control" id="ps_surname" name="ps_surname" required>

             </div>

          </div>

              <div class="row">

                <div id="place" class="col-md-12">
                  <label for="place">สถานที่คุมประพฤติ:</label>
                  <input type="text" class="form-control" id="place" name="pl_name" required>
                 </div>
               </div>


               <div class="row">
                    <label>   </label>
                 <div id="lat" class="col-md-6">
                   <label for="place">ละติจูด:</label>
                   <input type="text" class="form-control" id="lat" name="lat" required>
                  </div>

                  <div id="lon" class="col-md-6">
                    <label for="place">ลองจิจูด:</label>
                    <input type="text" class="form-control" id="lon" name="lon" required>
                   </div>

                </div>






</div>
      </div>
      <div class="modal-footer d-flex ">
      <!---ปุ่มบันทึก --><button type="submit"  onclick="" class="btn btn-success pull-right">บันทึก</button>

        </form>

      </div>
    </div>

  </div>
</div>

<div class="modal fade " id="infoModal" >
  <div class="modal-dialog modal-lg" >

    <div class="modal-content">
      <div class="modal-header">
          <h2>ข้อมูลผู้ถูกคุมประพฤติ</h2>
              <button type="button" class="close pull-right" data-dismiss="modal">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
              </button>

          </div>

          <div class="modal-body">

      <form class="form-horizantal" method="POST" action="/web_report/web_report_pri/c_list/ps_insert">
        <div class="container-fluid">
            <div class="row">
             <div id="pic" class="col-md-3" style=" ">
       <span>รูปภาพ</span>

             </div>
             <div class="col-md-9">
               <label for="ps_id">รหัส:</label>
               <input type="text" class="form-control" id="ps_id" name="ps_id" disabled>
             </div>
            </div>

            <div class="row">

             <div id="prename" class="col-md-3">

               <label class="control-label" for="pre_id">คำนำหน้า:</label>
                <input type="text" class="form-control" id="ps_id" name="ps_id" disabled>
             </div>

             <div id="name" class="col-md-5">
               <label for="ps_name">ชื่อ:</label>
               <input type="text" class="form-control" id="ps_name" name="ps_name" disabled>

             </div>

             <div id="surname" class="col-md-4">
               <label for="ps_surname">นามสกุล:</label>
               <input type="text" class="form-control" id="ps_surname" name="ps_surname"disabled>

             </div>

          </div>

              <div class="row">

                <div id="place" class="col-md-12">
                  <label for="place">สถานที่คุมประพฤติ:</label>
                  <input type="text" class="form-control" id="place" name="pl_name" disabled>
                 </div>
               </div>


               <div class="row">
                    <label>   </label>
                 <div id="lat" class="col-md-6">
                   <label for="place">ละติจูด:</label>
                   <input type="text" class="form-control" id="lat" name="lat" disabled>
                  </div>

                  <div id="lon" class="col-md-6">
                    <label for="place">ลองจิจูด:</label>
                    <input type="text" class="form-control" id="lon" name="lon" disabled>
                   </div>

                </div>






</div>
      </div>
      <div class="modal-footer d-flex ">


        </form>

      </div>
    </div>

  </div>
</div>



<div class="container-fluid">
  <span>
      <a  type="button" class="btn btn-success text-white" style="float:right; padding:3px; margin-bottom:5px;"
      data-toggle="modal" data-target="#insertModal">เพิ่มข้อมูล</a>
  </span>
<table class="table table-striped table-bordered" rold="grid" width="300 px;">
<thead class="panel-heading">
  <tr >
    <th id="t_head">ที่</th>
    <th class="psname" id="t_head" >ชื่อ-สกุล</th>
    <th class="place" id="t_head">สถานที่คุมประพฤติ(พิกัด ละติจูด/ลองจิจูด)</th>
    <th class="rad" id="t_head">ระยะอาณาเขตคุมประพฤติ(รัศมี(กม.))</th>
    <th class="tt_time" id="t_head">ระยะเวลาคุมประพฤติ</th>
    <th class="lf_time" id="t_head">ระยะเวลาคงเหลือ</th>
    <th class="pro" id="t_head">ข้อมูลเพิ่มเติม</th>
  </tr>
</thead>
<tbody>
  <?php foreach($rs_all->result() as $val){?>
  <tr>
    <td><?php echo $val->ps_id  ;?></td>
    <td><?php echo $val->pre_name.$val->ps_name." ".$val->ps_surname  ; ?></td>
    <td><?php echo $val->pl_name."(".$val->lat."/".$val->lon.")"  ; ?></td>
    <td align="center">5</td>
    <td>03:00:00:00:00</td>
    <td>02:01:03:12:30</td>
    <td><center>  <a  type="button" class="btn btn-warning"   data-toggle="modal" data-target="#infoModal"></a></td>
  </tr>
<?php } ?>
</tbody>
</table>
</div>

</div><!--end row for sidebar and main-->
