@extends('layouts.updated-master')

@section('topscript')
<style type="text/css">
.test {
	position: relative;
	margin-top: 92px;
	float: right;
}
#map-canvas { 
	height: 400px;
}
#moveup{
    top: -200px;
}
.dog-btns {
	position: relative;
	float: right;
	right: -500px;
}

</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3.14"></script>

<script type="text/javascript">
  function initialize() {

  	// assign values to lat/lng from address field
  	var address = $('#fullAddress').val();
  	console.log(address);
  	var geocoder = new google.maps.Geocoder();
  	geocoder.geocode({ 'address': address }, function(result, status) {
  	    if (status == google.maps.GeocoderStatus.OK) {
	  	    var latLngObj = result[0]["geometry"]["location"];
	  	    console.log(latLngObj);
  	    } // endif

  	    var mapOptions = {
  	      center: new google.maps.LatLng(29.428459, -98.492433),
  	      zoom: 11
  	    };

  	    var map = new google.maps.Map(document.getElementById("map-canvas"),
  	        mapOptions);

  	    // Create new marker based on lat/lng
  	    var marker = new google.maps.Marker({
  	        position: latLngObj,
  	        map: map,
  	        draggable: false,
  	        title: "Your Location",
  	        animation: google.maps.Animation.DROP // debug and add
  	    });  // End Marker

  	}); // end function

  } // end initialize
  
  google.maps.event.addDomListener(window, 'load', initialize);

</script>
@stop

@section('content')

<div class="container">

<div class="col-md-4">
	<div class="page-header">
			<div class="btn-group pull-right admin-buttons">

			@if (Auth::check())
				@if (Auth::user()->role == 'admin')

					<button type="button" class="btn btn-default">
				  		<a href="{{ action('UsersController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
					</button>

					<button type="button" class="btn btn-default">
			  			<a href="{{ action('UsersController@edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					</button>

					<a href="#" class="deleteUser btn btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
			@endif				
			</div>

		<h2>{{{ $user->username }}}</h2>
	</div> <!-- end page header -->

		@if ($user->img_path)
			<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail">
		@else 
			<img src="/includes/img/placeholder.png" class="img-responsive thumbnail">
		@endif

		<p class="lead">
			<h4>Full Name: 	{{{ $user->first_name . ' ' . $user->last_name }}}	</h4>
			<h4>Email: 		{{{ $user->email }}}								</h4>
			<h4>Role: 		{{{ $user->role }}}									</h4>
			<h4>Address: 	{{{ $user->address }}}								</h4>
			<h4>City: 		{{{ $user->city }}}									</h4>
			<h4>State: 		{{{ $user->state }}}								</h4>
			<h4>Zip: 		{{{ $user->zip }}}									</h4>
			<h4>Updated: 	{{{ $user->updated_at }}}							</h4>

			<input type="hidden" id="fullAddress" value="{{{ $user->fullAddress }}}">
		</p>
</div> <!-- end left container -->

	<div class="col-md-8 zero-pad-left">
		<div class="page-header"> 
			<h2 class="text-right">Location</h2>
		</div>
				
				<!-- Insert Google Map -->
				<div style="border: 1px solid black;">
					<div id="map-canvas"/>
				</div>
	</div>
	<div class="col-md-12 zero-pad-left">
		<div class="page-header">
			@if (isset($user))
			<h2>{{{ $user->username . '\'s dogs' }}}
			<button type="button" class="btn btn-default pull-right">
					<a href="{{ action('DogsController@create') }}"><span class="glyphicon glyphicon-plus"></span></a>
			</button>
			</h2>
			@endif
		</div>

	</div>

	@foreach ($user->dogs as $dog)

	  <div class="row">
	
	  	<div class="col-md-2">
	  	          <div class="btn-group dog-btns">
	  	          	<button type="button" class="btn btn-default btn-xs">
	  	          		<a href="{{ action('DogsController@show', $dog->id) }}"><span class="glyphicon glyphicon-zoom-in"></span></a>
	  	          	</button>

	  	          	<button type="button" class="btn btn-default btn-xs">
	  	          		<a href="{{ action('DogsController@edit', $dog->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
	  	          	</button>				

	  	          	<a href="#" class="deleteDog btn btn-danger btn-xs" data-dogid="{{ $dog->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

	  	          </div>

	  	          @if ($dog->img_path)
	  	          	<img src="{{{ $dog->img_path }}}" class="img-responsive thumbnail pull-right">
	  	          @else 
	  	          	<img src="/includes/img/placeholder.png" class="img-responsive thumbnail pull-right">
	  	          @endif

	  	</div> <!-- end dog image preview -->

	    <div class="zero-margin-left blog-block">
	      
	      <div class="col-md-6">
	        <h3>{{{ $dog->name }}}</h3>

	        <p>{{{ $dog->dog_info }}}</p>
	      </div>

	    </div>
	  </div> <!-- end row -->

	  @endforeach

	</div>
</div>

<!-- Hidden form to allow user deletion -->
{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
{{ Form::close() }}

<!-- Hidden form to allow dog deletion -->
{{ Form::open(array('action' => 'DogsController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
{{ Form::close() }}

@stop

@section('bottomscript')
<script type="text/javascript">
$(".deleteUser").click(function() {
	var userid = $(this).data('userid');
	$("#deleteForm").attr('action', '/users/' + userid);
	if (confirm("Are you sure you want to delete this user?")) {
		$('#deleteForm').submit();
	}
});
</script>
<script type="text/javascript">
	$(".deleteDog").click(function() {
		var dogid = $(this).data('dogid');
		$("#deleteForm").attr('action', '/dogs/' + dogid);
		if (confirm("Are you sure you want to delete this dog?")) {
			$('#deleteForm').submit();
		}
	});
</script>
@stop