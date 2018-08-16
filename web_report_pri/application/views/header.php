<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $title; ?></title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- font-awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">


    <!-- Bootstrap CSS -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css"> -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.1/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
     <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script> -->
    <!-- dataTable  -->
    <script src="https://code.jquery.com/jquery-3.3.1.js"> </script>
    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"> </script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>


    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script>
    $(document).ready(function(){
      $("#out").click(function(){
        $.ajax({
          url: "/web_report/web_report_pri/c_login/logout",
          type:'POST',
          data: null,
          success: function () {

            window.location.href="http://localhost/web_report/web_report_pri/c_login";
          },
          error: function() {

          }
          });
        });

        $(function() {

          $("#main").slideDown('slow').promise().always(function(){
    $("#side").height($("#main").height()); // drop sidebar down
}); // Just show homepage content

        });

    });

    </script>

    <style>

    html, body {
        max-width: 100%;
        overflow-x: hidden;
    }
#wrapper, img{
  width:1350px;
  height:200px;
}

.navbar-default {
    background-color: #b7f7f6;

}

li#v_me{
  border-bottom: 1px solid #565656;
    margin-bottom: 5px;
    padding-bottom: 5px;
}

li#h_me{
  border-right: 1px solid white;

}



#nav{

  margin-bottom:3px;

}
#side{

  margin-right:3px;
  margin-top:3px;
  margin-bottom:3px;
   position:relative;
   height:100%;

}
.nav-link.side{
  color:white;
}
</style>
    </head>
<body>
<?php  if($this->session->userdata('user_id') !=NULL) { ?>
  <nav id="nav" class="navbar navbar-default navbar-top topnav navbar-expand-lg " role="navigation">
    <a class="navbar-brand" href="http://localhost/web_report/web_report_pri/c_profile">ระบบติดตามผู้ถูกคุมความประพฤติ</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link" href="http://localhost/web_report/web_report_pri/c_profile">หน้าหลัก <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Dropdown
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">Something else here</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled" href="#">Disabled</a>
        </li>
      </ul>
      <form class="form-inline my-2 my-lg-0">
        <span class="label" style="float:right;margin:3px; "><?php  echo $this->session->userdata('username'); ?></span>

        <button class="btn btn-info" id="out" style="float:right; margin:3px;">log out</button>

      </form>
    </div>
  </nav>
  <div id="wrapper" style="display: flex;" >
      <img src="https://cdn-images-1.medium.com/max/1920/1*n5hJwlMee4H99f4JW-42CA.png" />
  </div>​​​​​​​​​​
  <div class="row " style="margin-top:-30px" >

    <div class="col-md-12" id="nav">
      <nav class="navbar-dark bg-primary navbar-expand-md "  >
        <ul class="navbar-nav nav-pills nav-justified"  >
          <li class="nav-item " id="h_me" >
            <a class="nav-link"  href="http://localhost/web_report/web_report_pri/c_table_report">ตรวจสอบตำแหน่ง</a>
          </li>
          <li class="nav-item " id="h_me">
            <a class="nav-link" href="#">Link 2</a>
          </li>
          <li class="nav-item " id="h_me">
          <a class="nav-link" href="#">Link 3</a>
          </li>
        </ul>
      </nav>
    </div>

  </div>
  <div class="row" >
     <div class="col-md-2" id="side">
       <ul class="nav flex-column  nav-pills bg-dark text-white rounded-right" id="v_main" style=" height:100%; width:108%;">
     <li class="nav-item  " id="v_me">
       <a class="nav-link side" href="#">Active</a>
     </li>
     <li class="nav-item " id="v_me">
       <a class="nav-link side" href="#">Link</a>
     </li>
     <li class="nav-item " id="v_me">
       <a class="nav-link side" href="#">Link</a>
     </li>
     <li class="nav-item " id="v_me">
       <a class="nav-link side disabled" href="#">Disabled</a>
     </li>
   </ul>
</div>
<?php  } ?>
