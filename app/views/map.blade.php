@extends('layouts.map')

@section('topscript')
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 100% }

  #addr-btn {
/*    float: right;
    position: relative;
    top: -53px;
    left: -20px;*/
  }

</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3Q4UzAfKDUWGr-KbI3nj19LxBstHbRZY"></script>
 -->
<script type="text/javascript">
    var map;
    var placeSearch, autocomplete;
    var componentForm = {
      street_number: 'short_name',
      route: 'long_name',
      locality: 'long_name',
      administrative_area_level_1: 'short_name',
      country: 'long_name',
      postal_code: 'short_name'
    };

    function initialize() {
      var mapOptions = {
        zoom: 10,
        center: new google.maps.LatLng(29.428459, -98.492433)
      };
      map = new google.maps.Map(document.getElementById('map-canvas'),
          mapOptions);

    // Add autocomplete to input form
    autocomplete = new google.maps.places.Autocomplete(
        /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
        { types: ['geocode'] });
    // When the user selects an address from the dropdown,
    // populate the address fields in the form.
    //google.maps.event.addListener(autocomplete, 'place_changed', function() {
      //fillInAddress();
    //});
    }

    // [START region_fillform]
    function fillInAddress() {
      // Get the place details from the autocomplete object.
      var place = autocomplete.getPlace();

      for (var component in componentForm) {
        document.getElementById(component).value = '';
        document.getElementById(component).disabled = false;
      }

      // Get each component of the address from the place details
      // and fill the corresponding field on the form.
      for (var i = 0; i < place.address_components.length; i++) {
        var addressType = place.address_components[i].types[0];
        if (componentForm[addressType]) {
          var val = place.address_components[i][componentForm[addressType]];
          document.getElementById(addressType).value = val;
        }
      }
    }
    // [END region_fillform]

    // Initialize map
    google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop

@section('content')

<div class="col-md-5">


    <div class="page-header">
        <h2> Google Maps Integration </h2>
    </div>
      <h3>Please enter address:</h3>
        <!-- <form> -->
            <input type="text" id="autocomplete" name="address" class="form-control form-group" value="" placeholder="">
            <button id="addr-btn" class="btn btn-default pull-right" action="submit">Submit</button>
        <!-- </form> -->
    <br>
    
    <div class="col-md-3 zero-pad-left">
        <form>
            <label>Latitude</label>
            <input id="latitude" name="latitude" class="form-group form-control" placeholder="" value="">
            <label>Longitude</label>
            <input id="longitude" name="longitude" class="form-group form-control" placeholder="" value="">
    </div>
    <div class="col-md-7 zero-pad-left">
            <label>Street</label>
            <input id="street" name="street" class="form-group form-control" placeholder="" value="">
            <label>City</label>
            <input id="city" name="city" class="form-group form-control" placeholder="" value="">
            <label>State</label>
            <input id="state" name="state" class="form-group form-control" placeholder="" value="">
            <label>Zip</label>
            <input id="zip" name="zip" class="form-group form-control" placeholder="" value="">
        </form>
    </div>

</div> <!-- end left container -->

<div class="col-md-7"> <!-- begin right container -->
    <div class="page-header text-right">
        <h2>Sample Map</h2>
    </div>

    <div id="map-canvas"/>

</div> <!-- end right container -->

@stop

@section('bottomscript')
<script type="text/javascript">

    // Add Marker on Address Submit and Button Click
    $('#addr-btn').click(function () {
        // Prevent default behavior of form submit
        // e.preventDefault();
        // Set variable address equal to user input
        var address = $('#autocomplete').val();

        // Geocode address to get lat/lng
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(result, status) {
            
            // If geocode status is OK, then set lat/lng variables.
            if (status == google.maps.GeocoderStatus.OK) {
              var latLngObj = result[0]["geometry"]["location"];

              // Update fields above with lat/lng values
              $('#latitude').val(result[0]["geometry"]["location"]["k"]);  // need to call functions instead of these variables
              $("#longitude").val(result[0]["geometry"]["location"]["B"]); //  ^
            }

            // Create new marker based on lat/lng
            var marker = new google.maps.Marker({
                position: latLngObj,
                map: map,
                draggable: false,
                title: "Marker"
                // animation: google.maps.Animation.DROP,
            });  // End Marker
        }); // End Geocoder

        // Populate Address Form with data parsed from autocomplete
        // ... Street
        // ... City
        // ... State
        // ... Zip

    }); // End click event for addr-btn

</script>
@stop