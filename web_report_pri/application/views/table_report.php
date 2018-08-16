<?php
    include('header.php');
    ?>
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
    padding: 5px;
    }
</style>
<div class="container" style="margin-top:3%" id="main">
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive-md">
            <table class="table text-center" id="test_data">
                <thead>
                    <tr>
                        <th style="width: 3%">ลำดับ</th>
                        <th style="width: 10%">ชื่อ</th>
                        <th style="width: 10%">นามสกุล</th>
                        <th style="width: 15%">สถานที่</th>
                        <th style="width: 15%">พิกัด</th>
                        <th style="width: 5%">สถานะ</th>


                    </tr>
                </thead>
            <tbody >
            <?php
                if($fetch_table->num_rows() > 0){
                    foreach ($fetch_table->result() as $row) {
                        // print_r($row);
            ?>
                        <tr>
                            <td><?php echo $row->ps_id; ?></td>
                            <td><?php echo $row->pre_name." ".$row->ps_name; ?></td>
                            <td><?php echo $row->ps_surname; ?></td>
                            <td class="text-left"><?php echo $row->pl_name; ?></td>
                            <td class="text-left"><?php echo $row->lat.", ".$row->lon ;?> </td>
                            <td id="action"></td>

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
        </div>
    </div>
    <div class=" col-md-12 pull-center" style="margin-top: 3%; margin-bottom:3%">
        <!-- <iframe style="width:100%; height:550px; border:none;" src="http://localhost/web_report/web_report_pri/c_maps"></iframe> -->
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
    </div>
</div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    // alert();
    // console.log("HELLO");
    $('#test_data').DataTable({
        "lengthMenu": [[5, 10, 15, -1], [5, 10, 15, "All"]]
    });

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
//
    var map;
    var position = {lat: 13.847860 , lng: 100.604274};
    function initMap() {
        var labels = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        var labelIndex = 0;
        var latPlace = [];
        var lngPlace = [];
        var circle;

        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 11,
            center: position,
            mapTypeId: 'terrain'
            // mapOption
        });
        var marker, info;
        $.getJSON("loadDataReport",function(jsonObj){
            $.each(jsonObj, function(i,item){
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(item.lat,item.lon),
                    map: map
                });
                circle = new google.maps.Circle({
                    map: map,
                    clickable: false,
                    radius: 5000,// metres
                    fillColor: '#fff',
                    fillOpacity: .6,
                    strokeColor: '#313131',
                    strokeOpacity: .4,
                    strokeWeight: .8
                });
            // attach circle to marker
                circle.bindTo('center', marker, 'position');
                // bounds[i] = circle.getBounds();
                // console.log(bounds+" : "+i)
                latPlace[i] = item.lat;
                lngPlace[i] = item.lon;

                console.log(latPlace[i],lngPlace[i])
                // create content of mark
                info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker,'click',(function(marker,i){
                        // console.log(item.place_name);
                    return function (){
                        info.setContent(item.pl_name);
                        info.open(map, marker);
                    }
                })(marker,i));
            }); // each loadPlaces
        });//get json
        document.getElementById('search').addEventListener('click',function(){
            setLatLng(position)
        });
        // search
        function setLatLng(position) {
            var lat = parseFloat(document.getElementById('lat').value);
            var lng = parseFloat(document.getElementById('lng').value);
            position = {lat: lat, lng: lng};
            var marker = new google.maps.Marker({
                    position: position,
                    draggable: true,
                    animation: google.maps.Animation.DROP,
                    label: labels[labelIndex++ % labels.length],
                    map: map,
            })
            var distance = google.maps.geometry.spherical.computeDistanceBetween(
                        new google.maps.LatLng(13.7958187, 100.574487), new google.maps.LatLng(lat, lng));
                    console.log(distance);
                    if(distance > 4973.476925843845){
                        // console.log("out");
                        $('#action').html("อยู่นอกเขต").css({"background-color":"red","color":"white"})

                    }else {
                        $('#action').html("อยู่ในเขต").css({"background-color":"green","color":"white"})
                        // console.log("in");
                    // $('#action').html("ดีมากไอหนู")

                    console.log(": "+true)

                    }
            google.maps.event.addListener(marker,'dragend',function (e){
                var getLat = marker.getPosition().lat();
                var getLng = marker.getPosition().lng();
                var getLngLat = {lat:getLat,lng:getLng}
                map.panTo(marker.getPosition());
                $('#lat').val(getLat);
                $('#lng').val(getLng);
                var distance = google.maps.geometry.spherical.computeDistanceBetween(
                    new google.maps.LatLng(latPlace[0], lngPlace[0]), new google.maps.LatLng(getLat, getLng));
                if(distance > 4973.476925843845){
                    // $.ajax({
                    //     url:"",
                    //     method:"POST",
                    //     data:"out of area",
                    //     success:function (data) {
                    //         $('#reportStatus').html(data);

                    //     }
                    // });
                    $('#action').html("อยู่นอกเขต")
                    $('#action').css({"background-color":"red"})
                    console.log(getLngLat+": "+false)
                }else {
                    $('#action').html("อยู่ในเขต")
                    $('#action').css({"background-color":"green"})
                    console.log(": "+true)

                }

            });
            map.panTo(marker.getPosition());
        }// function search

        // click mark on map
        google.maps.event.addListener(map, 'click', function(event) {
            placeMarker(event.latLng);
        });

        function placeMarker(position) {
            var marker = new google.maps.Marker({
                position: position,
                draggable: true,
                animation: google.maps.Animation.DROP,
                label: labels[labelIndex++ % labels.length],
                map: map,
            })
        }  // click mark on map

        // loadPrison location
        $.getJSON("loadPrisonLatLng",function(jsonObj){
            $.each(jsonObj, function(i,item){
                marker = new google.maps.Marker({
                    position: new google.maps.LatLng(13.79827,100.50458),
                    draggable: true,
                    icon: "http://maps.google.com/mapfiles/ms/icons/green-dot.png",
                    animation: google.maps.Animation.DROP,
                    map: map
                });
                // bounds[i] = circle.getBounds();
                // console.log(bounds[i].contains(getLngLat))

                info = new google.maps.InfoWindow();
                google.maps.event.addListener(marker,'click',(function(marker,i){
                        // console.log(item.place_name);
                    return function (){
                        info.setContent(item.ps_name + " " + item.ps_surname);
                        info.open(map, marker);
                    }
                })(marker,i));


            }); //each loadPrison
                google.maps.event.addListener(marker,'dragend',function (e){
                var psLat = marker.getPosition().lat();
                var psLng = marker.getPosition().lng();
                var getLngLat = {lat:psLat,lng:psLng}
                // function calcDistance (fromLat, fromLng, toLat, toLng) {
                    var distance = google.maps.geometry.spherical.computeDistanceBetween(
                        new google.maps.LatLng(13.7958187, 100.574487), new google.maps.LatLng(psLat, psLng));
                    console.log(distance);
                    if(distance > 4973.476925843845){
                        // console.log("out");
                        $('#action').html("อยู่นอกเขต").css({"background-color":"red","color":"white"})

                    }else {
                        $('#action').html("อยู่ในเขต").css({"background-color":"green","color":"white"})
                        // console.log("in");
                    // $('#action').html("ดีมากไอหนู")

                    console.log(": "+true)

                    }
                // }
                // map.panTo(marker.getPosition());

                });
        });//get json
        // function checkPosition (){

        // }
    }//init maps
</script>
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdgUKh6LfJfhpD2QUvp9tNTIXYtlNNGsg&callback=initMap">
</script>
<!-- <script src="http://maps.google.com/maps/api/js?sensor=false&libraries=geometry" type="text/javascript"></script> -->
