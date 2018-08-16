<?php
  // include('header.php');
    if ($this->session->userdata('user_id') == NULL) {
       header('location:http://localhost/web_report/web_report_pri/c_login');
    }
?>
<html>
<head>
<script src="http://maps.google.com/maps/api/js?sensor=false&libraries=spherical" type="text/javascript"></script>
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



#head{
  background-color: #d9e6fc;
  margin-bottom:3px;


}
#nav{
  
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

html, body {
    max-width: 100%;
    overflow-x: hidden;
}
</style>
</head>
<body>
     <div class="col" id="main">main

       <div id="canvas" style="width:80%; height:30%; min-height:300px;" >

       </div>

    </div>

</div>










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
