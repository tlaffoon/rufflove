@extends('layouts.master')

@section('topscript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.exp&libraries=places"></script>
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
          var geolocation = new google.maps.LatLng(
              position.coords.latitude, position.coords.longitude);
          autocomplete.setBounds(new google.maps.LatLngBounds(geolocation,
              geolocation));
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
        //console.log(address);

        var geocoder = new google.maps.Geocoder();
        geocoder.geocode({ 'address': address }, function(result, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                //console.log(result);
                $('#latitude').val(result[0]["geometry"]["location"]["k"]);  // need to call functions instead of these variables
                $("#longitude").val(result[0]["geometry"]["location"]["B"]); //  ^
            } // endif
        }); // end function

    } // end fillInAddress
    // [END region_fillform]
    </script>
@stop

@section('content')

<div class="col-md-6"> <!-- begin left container -->
    <div class="page-header">
        <h1>Register Your Account</h1>
    </div>
    
    {{ Form::open(array('action'=>'UsersController@store')) }}

    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
    {{ $errors->first('username', '<span class="help-block text-warning">:message</span><br>') }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
    {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
    {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::hidden('first_name', null, array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
    {{ Form::hidden('last_name', null, array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}

    {{ Form::hidden('role', null, array('value' => 'user')) }}

<!-- Refactor rest of form to laravel  -->

    <label>Address</label>
    <input id="autocomplete" name="address" type="text" class="form-group form-control" onFocus="geolocate()" placeholder="" value="">

    <button id="register-btn" class="btn btn-default" action="submit">Submit</button>

    </div> <!-- end left container -->

    <div class="container col-md-6"> <!-- begin right container -->

        <input id="street_number" name="street_number" type="text" class="" placeholder="" value="">
        <input id="route" name="route" type="text" class="" placeholder="" value="">
        <input id="locality" name="city" type="text" class="" placeholder="" value="">
        <input id="administrative_area_level_1" name="state" type="text" class="" placeholder="" value="">
        <input id="postal_code" name="zip" type="text" class="" placeholder="" value="">
        <input id="country" name="country" class="" placeholder="" value="">
        <input id="latitude" name="latitude" type="text" class="" placeholder="" value="">
        <input id="longitude" name="longitude" type="text" class="" placeholder="" value="">

    </div> <!-- end right container -->

    {{ Form::close() }}

@stop

@section('bottomscript')
<script type="text/javascript">
$(document).ready(function () {
    initialize();
});
</script>

@stop