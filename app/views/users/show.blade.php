@extends('layouts.updated-master')

@section('topscript')
<style type="text/css">
.test {
	position: relative;
	margin-top: 92px;
	float: right;
}

html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { 
	height: 50%;
}
#moveup{
    top: -200px;
}

</style>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3"></script>

<script type="text/javascript">
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

  } // end initialize
  
  google.maps.event.addDomListener(window, 'load', initialize);

</script>
@stop

@section('content')
<div class="col-md-2">


<div class="container">
	   <div class="page-header zero-margin-left zero-padding-left" id="banner">
        <div class="row">
          <div class="col-lg-8 col-md-7 col-sm-6 zero-margin-left zero-padding-left">
         	@if (Auth::user()->role == 'admin')
         		<h2>{{{ $user->username }}}</h2>
         	@endif
          </div>
        </div>
      </div>

	@if (!empty($user->img_path))
		<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail centered">
	@else
		<img src="includes/img/placeholder-user.png" class="img-responsive thumbnail centered">
	@endif
<div class="col-md-4">
  <p class="lead">
  	<div class="clearfix">
	<h4>Full Name: 	{{{ $user->first_name . ' ' . $user->last_name }}}	</h4>
	<h4>Email: 		{{{ $user->email }}}								</h4>
	<h4>Role: 		{{{ $user->role }}}									</h4>
	<h4>Address: 	{{{ $user->address }}}								</h4>
	<h4>City: 		{{{ $user->city }}}									</h4>
	<h4>State: 		{{{ $user->state }}}								</h4>
	<h4>Zip: 		{{{ $user->zip }}}									</h4>
	<h4>Updated: 	{{{ $user->updated_at }}}							</h4>

	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
	{{ Form::close() }}</p>
</div>
</div>
<div class="col-md-8" id="moveup">
  <h3 id="media-default">Dog Lover's Dogs</h3>
  <p>The default media allow to float a media object (images, video, audio) to the left or right of a content block.</p>
  <div class="bs-example">
    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64">
      </a>
      <div class="media-body">
        <h4 class="media-heading">Dog #1</h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
      </div>
    </div>
    <div class="media">
      <a class="pull-left" href="#">
        <img class="media-object" src="http://placehold.it/64x64">
      </a>
      <div class="media-body">
        <h4 class="media-heading">Dog #2</h4>
        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
        </div>
      </div>
    </div>
</div>
</div>
</div>






<div class="container col-md-2">
>>>>>>> b8439e0d847e10aac5e012b158790277b3cbc9c2
	<div class="test">
		<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail centered">
	</div>
</div>


<div class="col-md-10">
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

		<div class="col-sm-4 zero-pad-left">

		<h4>Full Name: 	{{{ $user->first_name . ' ' . $user->last_name }}}	</h4>
		<h4>Email: 		{{{ $user->email }}}								</h4>
		<h4>Role: 		{{{ ucfirst($user->role) }}}						</h4>
		<h4>Address: 	{{{ $user->address }}}								</h4>
		<h4>City: 		{{{ $user->city }}}									</h4>
		<h4>State: 		{{{ $user->state }}}								</h4>
		<h4>Zip: 		{{{ $user->zip }}}									</h4>
		<h4>Updated: 	{{{ $user->updated_at }}}							</h4>

		<input type="hidden" id="latitude" value="{{{ $user->lat }}}">
		<input type="hidden" id="longitude" value="{{{ $user->lng }}}">
		<input type="hidden" id="fullAddress" value="{{{ $user->fullAddress }}}">

		</div> <!-- end inner left div -->

		<div class="col-sm-8 zero-pad-right zero-pad-right">

			<!-- Insert Google Map -->
			<div style="border: 1px solid black;">
				<div id="map-canvas"/>
			</div>

		</div> <!-- end inner right div -->

	</div> <!-- end user detail main div -->

<div class="col-md-12 zero-pad-left">
	<div class="page-header">
		@if (isset($user))
		<h2>{{{ $user->username . '\'s dogs' }}}</h2>
		@endif
	</div>
	<button type="button" class="btn btn-default">
			<a href="{{ action('DogsController@create') }}"><span class="glyphicon glyphicon-plus"></span></a>
	</button>
</div>

@foreach ($user->dogs as $dog)

  <div class="row">

  	<div class="col-md-2"></div> <!-- fills sidebar space -->
  	
  	<div class="col-md-2">

  	        @if ($dog->img_path )
  	          <img src="{{{ $dog->img_path }}}" class="img-responsive thumbnail pull-right" alt="$dog->img_path">
  	        @else
  	          <img src="/includes/img/placeholder.png" class="img-responsive thumbnail pull-right" alt="$dog->img_path">
  	        @endif

  	</div> <!-- end dog image preview -->

    <div class="zero-margin-left blog-block">
      
      <div class="col-md-6">
        <h3>{{{ $dog->name }}}</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      </div>

    </div>
  </div> <!-- end row -->

  @endforeach


	<!-- Hidden form for user deletion -->
	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
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
@stop