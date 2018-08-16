<?php
if ($this->session->userdata('user_id') != NULL) {
   header('location:http://localhost/web_report/web_report_pri/c_profile');
}
?>
<html>
<head>


<script>

</script>
<style>
#pad{
 padding:10px;
}


.container .panel {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translateX(-50%) translateY(-50%);
}

body{
  background-color: #e5e7ea;
}
</style>
</head>
<body>

<div class="container" >

<form method="post" action="/web_report/web_report_pri/c_login/authen">

  <div class="col-xs-offset-3 col-xs-6">

  <div class="panel panel-default shadow-sm p-3 mb-5 bg-white rounded" style="width:25%; " >
    <div class="panel-content ">
     <div class="panel-heading ">
       <h3 class="panel-title text-center">Login</h3>
     </div>


      <div class="panel-body">
         <div class="form-group " id="pad">


          <div class="form-group">
                <label for="username">Username:</label>
                <input type="text" class="form-control" id="username" name="username" required>
          </div>

          <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
          </div>
      </div>
    </div>



      <div class="panel-footer">
        <div class="form-group" style="padding:5px;">
         <span align="center">
        don't have account:<a href='http://localhost/web_report/web_report_pri/reg' >Register</a>
         </span>
         <input  class="btn btn-success" style="float:right; padding:3px; " type="submit" name="Submit" value="Login">
        </div>
      </div>
    </div><!--end panel content-->
  </div>  <!--end panel-->
  </div><!--end wrap-->
</form>

</div>

</body>
</html>
