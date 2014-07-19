@extends('layouts.map')

@section('topscript')
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 100% }

  .width80 {
    width: 80%;
  }

  #addr-btn {
    float: right;
    position: relative;
    top: -53px;
    left: -20px;
  }

</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3Q4UzAfKDUWGr-KbI3nj19LxBstHbRZY"></script>
<script type="text/javascript">

  // var mapCenter = new google.maps.LatLng(54.19265, 16.1779); //Google map Coordinates
  // var map
  // function initialize() //function initializes Google map
  // {
  //   var googleMapOptions =
  //   {
  //       center: mapCenter, // map center
  //       zoom: 15, //zoom level, 0 = earth view to higher value
  //       panControl: true, //enable pan Control
  //       zoomControl: true, //enable zoom control
  //       zoomControlOptions: {
  //           style: google.maps.ZoomControlStyle.SMALL //zoom control size
  //        },
  //       scaleControl: true, // enable scale control
  //       mapTypeId: google.maps.MapTypeId.ROADMAP // google map type
  //   };
  //   map = new google.maps.Map(document.getElementById("google_map"), googleMapOptions);
  // }

  //   function addMyMarker() { //function that will add markers on button click
  //       var marker = new google.maps.Marker({
  //           position:mapCenter,
  //           map: map,
  //             draggable:true,
  //             animation: google.maps.Animation.DROP,
  //           title:"This a new marker!",
  //         icon: "http://maps.google.com/mapfiles/ms/micons/blue.png"
  //       });
  //   }

  // function initialize() {
  //   var mapOptions = {
  //     center: new google.maps.LatLng(29.4284595, -98.492433),
  //     zoom: 10
  //   };
  //   var map = new google.maps.Map(document.getElementById("map-canvas"),
  //       mapOptions);
  // }
  // google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop

@section('content')

<div class="col-md-5">
    <div class="page-header">
        <h2> Google Maps Integration </h2>
    </div>
      <h3>Please enter address:</h3>
            <input type="text" id="addressInput" name="address" class="form-control form-group width80" value="339 Mahogany Chest, San Antonio, TX, 78249" placeholder="">
            <button id="addr-btn" class="btn btn-default" action="submit">Submit</button>
    <br>

    <p id="address-text"></p> <!-- Display address upon user input and button click -->

    <address></address> <!-- Field populates on button click with address input by user. -->

</div> <!-- end left container -->

<div class="col-md-7">
    <div class="page-header text-right">
        <h2>Sample Map</h2>
    </div>
    <div id="map-canvas"/>

</div> <!-- end right container -->

@stop

@section('bottomscript')
<script type="text/javascript">

function searchLocations() {
  var address = $('#addressInput').val();
  console.log('Address Entered in id addressInput: ' + address);
  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({address: address}, function(results, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      searchLocationsNear(results[0].geometry.location);
    } else {
      alert(address + ' not found');
    }
  });
}














// var map;
// var markersList=[];

// function placeMarker(location) {
//     // first remove all markers if there are any
//     deleteOverlays();

//     var marker = new google.maps.Marker({
//         position: location, 
//         map: map
//     });


    // function addmarker(latlong) {
    //     var marker = new google.maps.Marker({
    //         position: latlong,
    //         title: 'new marker',
    //         draggable: false,
    //         map: map
    //     });
    // }



    // $('#addr-btn').click(function () {
    //       var address = $('#addr-value').val();
    //       var latlng = new google.maps.LatLng(42.745334, 12.738430);

    //       console.log(address);
    //       $('#address-text').text('You entered: ' + address);
    //       $('#address').text(address);

    //     var geocoder = new google.maps.Geocoder();
    //     geocoder.geocode({ 'address': address }, function(result, status) {
    //         if (status == google.maps.GeocoderStatus.OK) {
    //           console.log(result);          
    //           var latLngObj = result[0]["geometry"]["location"];
    //           console.log(latLngObj);
    //           addmarker(latlng)
    //         }
    //     });
    // }); // end event from button click


        // map.setCenter(marker.getPosition())

// }



    // function initGMap()
    // {
    //     var latlng = new google.maps.LatLng(39, 20);
    //     var myOptions = {
    //         zoom: 10,
    //         center: latlng,
    //         mapTypeId: google.maps.MapTypeId.ROADMAP
    //     }


    //     map = new google.maps.Map(document.getElementById("map"), myOptions);

    //     // add a click event handler to the map object and get the lat Lng and then place it on the map
    //     google.maps.event.addListener(map, "click", function(event)
    //     {
    //         // place a marker
    //         placeMarker(event.latLng);

    //         // display the lat/lng in your form's lat/lng fields
    //         document.getElementById("latVal").value = event.latLng.lat();
    //         document.getElementById("lngVal").value = event.latLng.lng();
    //     });
    // };

    // here is the function to place Marker on the map
    // function placeMarker(location) {
    //     // first remove all markers if there are any
    //     deleteOverlays();

    //     var marker = new google.maps.Marker({
    //         position: location, 
    //         map: map
    //     });
    // };

    // $("address").each(function(){                         
    //     var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
    //     $(this).html(embed);
    // });


</script>
@stop