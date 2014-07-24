@extends('test')

@section('topscript')
<style type="text/css">
 #map-canvas { height: 400px; }
</style>
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

 	// assign values to lat/lng from address field
  	var address = $('#fullAddress').val();
  	console.log(address);
  	var geocoder = new google.maps.Geocoder();
  	geocoder.geocode({ 'address': address }, function(result, status) {
  	    if (status == google.maps.GeocoderStatus.OK) {
  	        var latitude = $('#latitude').val();  // need to call functions instead of these variables
  	        var longitude = $('#longitude').val(); //  ^
	  	    var latLngObj = result[0]["geometry"]["location"];
	  	    console.log(latitude + ' ' + longitude);
	  	    console.log(latLngObj)
  	    } // endif

  	    var mapOptions = {
  	      center: new google.maps.LatLng(latitude, longitude),
  	      zoom: 11
  	    };

  	    var map = new google.maps.Map(document.getElementById("map-canvas"),
  	        mapOptions);

  	    // Create new marker based on lat/lng
  	    var marker = new google.maps.Marker({
  	        position: latLngObj,
  	        map: map,
  	        draggable: false,
  	        title: "Your Location"
  	        // animation: google.maps.Animation.DROP, // debug and add
  	    });  // End Marker
  	}); // end function

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
<div class="col-md-6">

<div class="clearfix"></div>

<div class="page-header">
		<div class="btn-group pull-right admin-buttons">

				<button type="button" class="btn btn-default">
					<a href="{{ action('UsersController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
				</button>
				
				<button type="button" class="btn btn-default">
					<a href="{{ action('UsersController@show', $user->id) }}"><span class="glyphicon glyphicon-zoom-in"></span></a>
				</button>

			@if (Auth::user()->role == 'admin')
				@if (isset($user))

				<a href="#" class="deleteUser btn btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
			@endif
			
		</div>

	@if (isset($user))
			<h2>Edit User: {{{ $user->username }}}</h2>
		{{ Form::model($user, array('action' => array('UsersController@update', $user->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
	@else
			<h2>Create New User</h2>
		{{ Form::open(array('action' => 'UsersController@store'), array('files' => true))}}
	@endif
	</div>

	{{ Form::token() }}

	<div class="clearfix"></div>

	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
	{{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	<div class="form-group zero-left-margin">

	{{ Form::label('role', 'Role') }}
	{{ Form::select('role', array('user' => 'User', 'admin' => 'Admin'), 'user', array('class' => 'form-group form-control dropdown btn btn-default')) }}
	
	</div>

	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', Input::old('username'), array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
	{{ $errors->first('username', '<span class="help-block text-warning">:message</span><br>') }}

	{{ Form::label('email', 'Email') }}
	{{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
	{{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
	{{ $errors->first('first_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
	{{ $errors->first('last_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::hidden('street_num', Input::old('street_num'), array('id' => 'street_number')) }}
	{{ Form::hidden('street', Input::old('street'), array('id' => 'route')) }}
	{{ Form::hidden('city', Input::old('city'), array('id' => 'locality')) }}
	{{ Form::hidden('state', Input::old('state'), array('id' => 'administrative_area_level_1')) }}
	{{ Form::hidden('zip', Input::old('zip'), array('id' => 'postal_code')) }}
	{{ Form::hidden('country', Input::old('country'), array('id' => 'country')) }}
	{{ Form::hidden('latitude', $user->lat, array('id' => 'latitude')) }}
	{{ Form::hidden('longitude', $user->lng, array('id' => 'longitude')) }}

	{{ Form::label('address', 'Address') }}
	{{ Form::text('address', Input::old('fullAddress'), array('id' => 'autocomplete', 'class' => 'form-group form-control', 'onfocus' => 'geolocate()' )) }}

	{{ Form::submit('Save', array('class' => 'btn btn-success pull-right')) }}
</div> <!-- end left container -->

<div class="col-md-6" style="margin-top: 4px;">
	<div class="page-header">
		<h2 class="text-right">Image Preview</h2>
	</div>

	<div>
		<img src="{{{ $user->img_path }}}" class="img-thumbnail responsive">
	</div>

	{{ Form::label('image', 'Image') }}

	{{ Form::file('image', array('class' => 'form-group')) }}
	{{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}
	{{ Form::close() }}

	<div class="page-header">
		<h2 class="text-right">Location</h2>
	</div>

	<input type="hidden" id="latitude" value="{{{ $user->lat }}}">
	<input type="hidden" id="longitude" value="{{{ $user->lng }}}">
	<input type="hidden" id="fullAddress" value="{{{ $user->fullAddress }}}">

	<div>
		<div id="map-canvas"/>
	</div>

</div>  <!-- end right container -->

	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
	{{ Form::close() }}

@stop

@section('bottomscript')
<script type="text/javascript">
$(document).ready(function () {
	//
	initialize();

	$(".deleteUser").click(function() {
		var userid = $(this).data('userid');
		$("#deleteForm").attr('action', '/users/' + userid);
		if (confirm("Are you sure you want to delete this user?")) {
			$('#deleteForm').submit();
		}
	});
});  // end document ready
</script>
@stop