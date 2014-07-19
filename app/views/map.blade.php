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

</script>
@stop

@section('content')

<div class="col-md-5">
    <div class="page-header">
        <h2> Google Maps Integration </h2>
    </div>
      <h3>Please enter address:</h3>
            <input type="text" id="addr-value" name="address" class="form-control form-group width80" value="339 Mahogany Chest, San Antonio, TX, 78249" placeholder="">
            <button id="addr-btn" class="btn btn-default" action="submit">Submit</button>
    <br>

    <p id="address-text"></p> <!-- Display address upon user input and button click -->

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
    $('#addr-btn').click(function () {
        // define variable address with the value of the input field above
          var address = $('#addr-value').val();
          console.log('Variable address: ' + address);
          
        // define variable latlng by calling LatLng function on address above
          var latlng = new google.maps.LatLng(address);
          console.log('Variable latlng: ' + latlng);

        // Update text field above
          $('#address-text').text('You entered: ' + address);

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(result, status) {
            
            if (status == google.maps.GeocoderStatus.OK) {
              console.log(result);

              var latLngObj = result[0]["geometry"]["location"];
              console.log(latLngObj);
            }
        });
    }); // end event from button click
</script>
@stop