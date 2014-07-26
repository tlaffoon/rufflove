@extends('layouts.updated-master')

@section('topscript')
<style type="text/css">
  #map-canvas { height: 500px; }
</style>
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.14exp&libraries=places"></script>
 --><script src="http://maps.googleapis.com/maps/api/js?v=3.14&libraries=places"></script>
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

      // Create the autocomplete object, restricting the search
      // to geographical location types.
      autocomplete = new google.maps.places.Autocomplete(
          /** @type {HTMLInputElement} */(document.getElementById('autocomplete')),
          { types: ['geocode'] });
      // When the user selects an address from the dropdown,
      // populate the address fields in the form.
      google.maps.event.addListener(autocomplete, 'place_changed', function() {
        fillInAddress();
      });
    }

    // [START region_geolocation]
    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
      if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(function(position) {
          var geolocation = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
          autocomplete.setBounds(new google.maps.LatLngBounds(geolocation, geolocation));
        });
      }
    }
    // [END region_geolocation]

    // [START region_fillform]
    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }  // end loop

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        } // end loop

        var address = $('#autocomplete').val();
        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(result, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //console.log(result);
                $('#latitude').val(result[0]["geometry"]["location"]["k"]);  // need to call functions instead of these variables
                $("#longitude").val(result[0]["geometry"]["location"]["B"]); //  ^
            } // endif

            var latLngObj = result[0]["geometry"]["location"];
            // Create new marker based on lat/lng
            var marker = new google.maps.Marker({
                position: latLngObj,
                map: map,
                draggable: false,
                title: "Your Location"
                // animation: google.maps.Animation.DROP, // debug and add
            });  // End Marker
        }); // end function

    } // end fillInAddress
    // [END region_fillform]

    // google.maps.event.addDomListener(window, 'load', initialize);
    </script>
@stop

@section('content')

<div class="container">

<div class="col-md-5"> <!-- begin left container -->
    <div class="page-header">
        <h1>Register Your Account</h1>
    </div>
    
    {{ Form::open(array('action'=>'UsersController@store')) }}

    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
    {{ $errors->first('username', '<span class="help-block text-danger text-right">:message</span>') }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
    {{ $errors->first('email', '<span class="help-block"><p class="text-danger text-right">:message</p></span>') }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
    {{ $errors->first('password', '<span class="help-block"><p class="text-danger text-right">:message</p></span>') }}

    {{ Form::label('confirm-password', 'Confirm Password') }}
    {{ Form::password('confirm-password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
    {{ $errors->first('confirm-password', '<span class="help-block"><p class="text-danger text-right">:message</p></span>') }}

    <div class="col-sm-6 zero-margin-left zero-pad-left">
        {{ Form::label('first_name', 'First Name') }}
        {{ Form::text('first_name', null, array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
    </div>

    <div class="col-sm-6 zero-margin-left zero-pad-left zero-pad-right">
        {{ Form::label('last_name', 'Last Name') }}
        {{ Form::text('last_name', null, array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
    </div>

    {{ Form::hidden('role', 'user', array('id' => 'role')) }}
    {{ Form::hidden('street_num', null, array('id' => 'street_number')) }}
    {{ Form::hidden('street', null, array('id' => 'route')) }}
    {{ Form::hidden('city', null, array('id' => 'locality')) }}
    {{ Form::hidden('state', null, array('id' => 'administrative_area_level_1')) }}
    {{ Form::hidden('zip', null, array('id' => 'postal_code')) }}
    {{ Form::hidden('country', null, array('id' => 'country')) }}
    {{ Form::hidden('latitude', null, array('id' => 'latitude')) }}
    {{ Form::hidden('longitude', null, array('id' => 'longitude')) }}

    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, array('id' => 'autocomplete', 'class' => 'form-group form-control bordered', 'onfocus' => 'geolocate()')) }}
    
    {{ Form::submit('Submit', array( 'id' => 'register-btn', 'class' => 'btn btn-default pull-right')) }}
    {{ Form::close() }}

    </div> <!-- end left container -->

    <div class="col-md-7"> <!-- begin right container -->
        <div class="page-header">
            <h1 class="text-right">Your Location</h1>
        </div>

        <div id="map-canvas"/>

    </div> <!-- end right container -->
    </div> <!-- end main container -->
</div> <!-- footer fix div -->

@stop

@section('bottomscript')
<script type="text/javascript">
    $(document).ready(function () {
        initialize();
    });
</script>

@stop