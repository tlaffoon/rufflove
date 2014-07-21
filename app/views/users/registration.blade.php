@extends('layouts.master')

@section('topscript')
@stop

@section('content')

<div class="container col-md-6">
    <h1>Registration Form</h1>

<div class="clearfix"></div>

{{ Form::open(array('action'=>'UsersController@store', 'files' => true)) }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
    {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    <div class="form-group zero-left-margin">

    {{ Form::hidden('role', null, array('value' => 'user')) }}

    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
    {{ $errors->first('username', '<span class="help-block text-warning">:message</span><br>') }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
    {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', null, array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
    {{ $errors->first('first_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('last_name', 'Last Name') }}
    {{ Form::text('last_name', null, array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
    {{ $errors->first('last_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, array('class' => 'form-group form-control', 'placeholder' => 'Address')) }}
    {{ $errors->first('address', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('city', 'City') }}
    {{ Form::text('city', null, array('class' => 'form-group form-control', 'placeholder' => 'City')) }}
    {{ $errors->first('city', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('state', 'State') }}
    {{ Form::text('state', null, array('class' => 'form-group form-control', 'placeholder' => 'State')) }}
    {{ $errors->first('state', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('zip', 'Zip') }}
    {{ Form::text('zip', null, array('class' => 'form-group form-control', 'placeholder' => 'Zip')) }}
    {{ $errors->first('zip', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::text('latitude', null, array('value' => '')) }}
    {{ Form::text('longitude', null, array('value' => '')) }}

    <button id="register-btn" class="btn btn-default" action="submit">Submit</button>

    {{ Form::close() }}


    </div>
</div> <!-- end main container -->
@stop

@section('bottomscript')
<script type="text/javascript">
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

    // // Add Marker on Address Submit and Button Click
    // $('#register-btn').click(function () {
    //     // Set variable address equal to user input
    //     var address = $('#addr-value').val();

    //     // Geocode address to get lat/lng
    //     var geocoder = new google.maps.Geocoder();
    //     geocoder.geocode({ 'address': address }, function(result, status) {
            
    //         // If geocode status is OK, then set lat/lng variables.
    //         if (status == google.maps.GeocoderStatus.OK) {
    //           var latLngObj = result[0]["geometry"]["location"];
    //           console.log('Latitude: ' + result[0]["geometry"]["location"]["k"]);
    //           console.log('Longitude: ' + result[0]["geometry"]["location"]["B"]);

    //           // Update input fields above with lat/lng values
    //           $('#latitude').val(result[0]["geometry"]["location"]["k"]);
    //           $("#longitude").val(result[0]["geometry"]["location"]["B"]);
    //         }
    //     }); // End Geocoder
    // }); // End click event for addr-btn
</script>

@stop