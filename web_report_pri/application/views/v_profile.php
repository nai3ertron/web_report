<?php
  include('header.php');
    if ($this->session->userdata('user_id') == NULL) {
       header('location:http://localhost/web_report/web_report_pri/c_login');
    }
?>
<html>
<head>

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
});

</script>

<style>


#state{
  background-color: #d9e6fc;
  margin-bottom:3px;

}

#head{
  background-color: #d9e6fc;
  margin-bottom:3px;

}
#nav{
  background-color: #d9e6fc;
  margin-bottom:3px;

}
#side{
  background-color: #d9e6fc;
  margin-right:3px;
  margin-top:3px;
  margin-bottom:3px;
  max-height: 500px;

}
#main{

  background-color: #d9e6fc;
    height: 500px;
    margin-left:3px;
    margin-top:3px;
    margin-bottom:3px
}
#foot{
  background-color: #d9e6fc;
    margin-top:3px;
    clear:both;


}

</style>

</head>
<body>


  <div class="row">

    <div class="col-md-12" id="state">
      <button class="btn btn-info" id="out" style="float:right; margin:3px;">log out</button>
     <span class="label" style="float:right;margin:3px; "><?php echo $this->session->userdata('username'); ?></span>

    </div>
  </div>

    <div class="row">

      <div class="col-md-12" id="head">head


      </div>

    </div>

  <div class="row">
    <div class="col-md-12" id="nav">

      <nav class="navbar-expand-sm ">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#">Link 1</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 2</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link 3</a>
          </li>
        </ul>
      </nav>

    </div>
  </div>
  <div class="row">
     <div class="col-md-2" id="side">

     </div>
     <div class="col" id="main">main

       <div id="canvas" style="width:80%; height:30%; min-height:300px;" >

       </div>

    </div>



    </div>
</div>
  <div class="row">
    <div class="col-md-12" id="foot">
    <footer class="container-fluid text-center">
      <p>Footer Text</p>
    </footer>
    </div>
  </div>






</body>
<script>
function myMap() {
  var myCenter = new google.maps.LatLng(51.508742,-0.120850);
  var mapCanvas = document.getElementById("canvas");
  var mapOptions = {center: myCenter, zoom: 5};
  var map = new google.maps.Map(mapCanvas, mapOptions);
  var marker = new google.maps.Marker({position:myCenter});
  marker.setMap(map);

  var circle = new google.maps.Circle({
  map: map,
  radius: 16093,    // 10 miles in metres
  fillColor: '#AA0000'
});

circle.bindTo('center', marker, 'position');
}
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBP1lvWuBXEvsTFZyzSTRC0ZPcNij0hFjg&callback=myMap"></script>
<html>
