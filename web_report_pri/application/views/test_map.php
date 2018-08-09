<?php 
    include('header.php');
?>
<!DOCTYPE html>
<html>
  <head>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
    min-height: 550px;
    width: 100%;
    height:100%;
}
/* Optional: Makes the sample page fill the window. */
html, body {
    height: 100%;
    margin: 0px;
    padding: 0px;
}
.float-panal{
    position : absolute;
    top: 25px;
    left: 25%;
    z-index: 5;
    /* background-color: #fff; */
    padding: 5px;
    /* border: 1px solid #999; */
    /* text-align: center;
    font-family: 'Roboto','sans-serif';
    line-height: 30px;
    padding-left: 10px; */
}
    </style>
  </head>
  <body>
  <div class="float-panal">
    <div class="row">
        <div class="col-md-4 form-group">
            <input class="form-control input-sm" type="text" id="lat" placeholder="latitude"> 
        </div>
        <div class="col-md-4 form-group">
            <input class="form-control input-sm" type="text" id="lng" placeholder="longitude">
        </div>
        <div class="col-md-4 form-group">
            <button class="btn btn-primary" id="search" >search</button>
        </div>
    </div>
  </div>
    <div class="col-md-12" style="padding:0px;">
        <div id="map"></div>
    </div>
<script >
    var map;
    // function insert_latlon() {
    //     var lat = document.getElementById("lat");
    //     var lon = document.getElementById("lon");
    // }
    var position = {lat: 13.847860 , lng: 100.604274};
    // console.log(position);
    // var mapOption = {
    //     zoom: 11,
    //     center: position,
    //     mapTypeId: 'terrain'
    // }
    // if(lat == '' & lon == ''){
    //     console.log("no data");
    // }else{
    function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: position,
            mapTypeId: 'terrain'
            // mapOption
        });
        var marker, info;
        $.getJSON("c_table_report/loadDataReport",function(jsonObj){
            $.each(jsonObj, function(i,item){
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item.lat,item.lon),
                    map: map
                });
                info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker,'click',(function(marker,i){
                        console.log(item.place_name);
                    return function (){
                        info.setContent(item.place_name);
                        info.open(map, marker);
                    }
                })(marker,i));
            });
        });
        document.getElementById('search').addEventListener('click',function(){
                setLatLng(position)
        });
        function setLatLng(position) {
            var lat = parseFloat(document.getElementById('lat').value);
            var lng = parseFloat(document.getElementById('lng').value);
            position = {lat: lat , lng: lng};
            var map = new google.maps.Map(document.getElementById('map'), {
                center: position,
                zoom: 11,
                mapTypeId: 'terrain'
            });
            // var marker = new google.maps.Marker({
            //         position: position,
            //         map: map
            // })
            // var info = new google.maps.InfoWindow({
            //         content: '<div style="font-size: 15px">ชื่ออะไรซักอย่าง</div>'
            // })
            // google.maps.event.addListener(marker,'click',function () {
            //     info.open(map,marker);
            // })
        }// function search
    }//init

        // var geocode =  new google.maps.Geocoder();
        // document.getElementById('search').addEventListener('click',function(){
        //     geocodeAddress(geocode,map);
            
        // });
    // function geocodeAddress(geocode,maps) {
    //     var address = document.getElementById('address').value;
    //     var lat = document.getElementById('lat').value;
    //     var lon = document.getElementById('lon').value;

    //     console.log(address);
    //     geocode.geocode({'lat':lat,'lng':lon},function(results,status){
    //         if(status === 'OK'){
    //             maps.setCenter(results[0].geometry.location);
    //             var marker = new google.maps.Marker({
    //                 map: maps,
    //                 position: results[0].geometry.location
    //             });
    //         }else{
    //             alert('not found' + status);
    //         }
    //     });
    // }
        // var marker = new google.maps.Marker({
        //     position: position,
        //     map: map
        // })
        // var info = new google.maps.InfoWindow({
        //     content: '<div style="font-size: 15px">ชื่ออะไรซักอย่าง</div>'
        // })
        // google.maps.event.addListener(marker,'click',function () {
        //     info.open(map,marker);
        // })
        // var circle = new google.maps.Circle({
        //     map: map,
        //     radius: 5000,    // 10 miles in metres
        //     fillColor: '#AA0000'
        //     });

        // circle.bindTo('center', marker, 'position');

        // google.maps.event.addListener(map, 'click', function(event) {
        // placeMarker(event.latLng);

        // });

        // function placeMarker(location) {

        // if (marker == null)
        // {
        // marker = new google.maps.Marker({
        // position: location,
        // map: map
        // }); } else {   marker.setPosition(location); } }
    // }
    
</script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdgUKh6LfJfhpD2QUvp9tNTIXYtlNNGsg&callback=initMap">
</script>
  </body>
</html>