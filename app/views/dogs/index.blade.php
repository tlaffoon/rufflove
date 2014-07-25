@extends('layouts.updated-master')


@section('topscript')
<style type="text/css">
#map-canvas { 
	height: 400px;
}
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3"></script>
<script type="text/javascript">
  // function initialize() {

  // 	// assign values to lat/lng from address field
  // 	var address = $('#fullAddress').val();
  // 	console.log(address);
  // 	var geocoder = new google.maps.Geocoder();
  // 	geocoder.geocode({ 'address': address }, function(result, status) {
  // 	    if (status == google.maps.GeocoderStatus.OK) {
  // 	        var latitude = $('#latitude').val();  // need to call functions instead of these variables
  // 	        var longitude = $('#longitude').val(); //  ^
	 //  	    var latLngObj = result[0]["geometry"]["location"];
	 //  	    console.log(latitude + ' ' + longitude);
	 //  	    console.log(latLngObj);
  // 	    } // endif

  // 	    var mapOptions = {
  // 	      center: new google.maps.LatLng(latitude, longitude),
  // 	      zoom: 11
  // 	    };

  // 	    var map = new google.maps.Map(document.getElementById("map-canvas"),
  // 	        mapOptions);

  // 	    // Create new marker based on lat/lng
  // 	    var marker = new google.maps.Marker({
  // 	        position: latLngObj,
  // 	        map: map,
  // 	        draggable: false,
  // 	        title: "Your Location"
  // 	        // animation: google.maps.Animation.DROP, // debug and add
  // 	    });  // End Marker
  // 	}); // end function

  // } // end initialize
  
  // google.maps.event.addDomListener(window, 'load', initialize);

</script>
</script>
@stop

@section('content')
<div class="col-md-12">

  <div class="page-header">
	<h2>Dog Index</h2>
  </div>

  {{ Form::open(array('action' => array('DogsController@index'), 'id' => 'ajax-form', 'class'=>'form width88', 'role'=>'search')) }}    
      <h3>Search for dog by name</h3>
      {{ Form::text('search-name', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by individual dog name here...')) }}
    
    <!-- end main search form -->

    <!-- Begin breed search form -->
      <br>
      <h3>Sex</h3>
      
      Female
      {{ Form::radio('sex', 'F', false) }}
      
      Male
      {{ Form::radio('sex', 'M', false) }}
      <br>
      
      <h3>Purebred</h3>
      
      Yes
      {{ Form::radio('purebred', 'Y', false) }}
      No
      {{ Form::radio('purebred', 'N', false) }}
      <br>

      <h3>Enter search radius</h3>
      {{ Form::text('distance', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter Miles')) }}
    <div id="prefetch">
        <h3>Search for breed</h3>
      {{ Form::text('search-breed', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Enter Breed')) }}
    </div>
    {{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
    {{ Form::close() }}

<table class="table table-striped fixed">
	<tr>
		<th width="20px">ID</th>
		<th>Breed</th>
		<th>Name</th>
		<th>Sex</th>
		<th>Age</th>
		<th>Purebred</th>
		<th>Owner</th>
		<th width="220px">Actions</th>
	</tr>

	@foreach ($dogs as $dog)
	<tr>
		<td>{{{ $dog->id }}}</td>
		<td>{{{ $dog->breed->name }}}</td>
		<td>{{{ $dog->name }}}</td>
		<td>{{{ $dog->sex }}}</td>
		<td>{{{ $dog->age }}}</td>
		<td>{{{ $dog->purebred }}}</td>
		<td>{{{ $dog->user->username }}}</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default">
					<a href="{{ action('DogsController@show', $dog->id) }}"><span class="glyphicon glyphicon-zoom-in"></span></a>
				</button>

				<button type="button" class="btn btn-default">
					<a href="{{ action('DogsController@edit', $dog->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
				</button>				

				<a href="#" class="deleteDog btn btn-danger" data-dogid="{{ $dog->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

			</div>
		</td>
	</tr>

  <input type="hidden" id="latitude" value="{{{ $dog->user->lat }}}">
  <input type="hidden" id="longitude" value="{{{ $dog->user->lng }}}">
  <input type="hidden" data-id="fullAddress" value="{{{ $dog->user->fullAddress }}}">

	@endforeach
</table>

	<center><div>{{ $dogs->links() }}</div></center>

			<!-- Hidden form to allow deletion -->
			{{ Form::open(array('action' => 'DogsController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
			{{ Form::close() }}


	<div class="col-md-12">
		<div id="map-canvas"/>
	</div>

</div> <!-- end main container -->
@stop

@section('bottomscript')
<script type="text/javascript">

var mapOptions = {
  center: new google.maps.LatLng(29.4814305, -98.5144044),
  zoom: 8
};

var map = new google.maps.Map(document.getElementById("map-canvas"),
    mapOptions);

$('#fullAddress').each(function () {

	$("input").data("address");
	console.log(this.val());

	var address = $('#fullAddress').val();
	console.log(address);
	var geocoder = new google.maps.Geocoder();
	geocoder.geocode({ 'address': address }, function(result, status) {
	    if (status == google.maps.GeocoderStatus.OK) {
	        //console.log(result);
	        // $('#latitude').val(result[0]["geometry"]["location"]["k"]);  // need to call functions instead of these variables
	        // $("#longitude").val(result[0]["geometry"]["location"]["B"]); //  ^
	        var latLngObj = result[0]["geometry"]["location"];
	    } // endif

	    // Create new marker based on lat/lng
	    var marker = new google.maps.Marker({
	        position: latLngObj,
	        map: map,
	        draggable: false,
	        title: "Marker"
	        // animation: google.maps.Animation.DROP, // debug and add
	    });  // End Marker
	}); // end function
}); // end each loop

</script>

<script type="text/javascript">
// $('#ajax-form').on('submit', function (e) {
// 	e.preventDefault();
// 	var formValues = $(this).serialize();
// 	console.log('formValues: ' + formValues);

// 	$.ajax({
// 		url: "/results",
// 		type: "POST",
// 		data: formValues,
// 		dataType: "json",
// 		success: function (data) {
// 			console.log(data);
// 			// $('#ajax-message').html(data.message);
// 			$(data).each(function() {
// 				console.log('=========');
// 				console.log('Id: ' + this.id);
// 				console.log('Breed: ' + this.breed.name);
// 				console.log('Dog Name: ' + this.name);
// 				console.log('Sex: ' + this.sex);
// 				console.log('Age: ' + this.age);
// 				console.log('Purebred? ' + this.purebred);
// 				console.log('Owner: ' + this.user.username);
// 				console.log('Lat: ' + this.user.lat);
// 				console.log('Lng: ' + this.user.lng);
// 				console.log('=========');
// 			});
// 		}
// 	});
// }); // end ajax form submit block
</script>

<script type="text/javascript">
  var breeds = new Bloodhound({
	datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	queryTokenizer: Bloodhound.tokenizers.whitespace,
	limit: 10,
	prefetch: {
	  url: '/includes/data/breeds.json',
	  filter: function(list) {
		return $.map(list, function(country) { return { name: country }; });
	  }
	}
  });
   
  // kicks off the loading/processing of `local` and `prefetch`
  breeds.initialize();
   
  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('#prefetch .typeahead').typeahead(null, {
	name: 'breeds',
	displayKey: 'name',
	// `ttAdapter` wraps the suggestion engine in an adapter that
	// is compatible with the typeahead jQuery plugin
	source: breeds.ttAdapter()
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