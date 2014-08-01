@extends ('layouts.updated-master')

@section('topscript')
<style type="text/css">
#map-canvas { 
	height: 500px;
}
</style>
<script src="http://maps.googleapis.com/maps/api/js?v=3.14"></script>
@stop

@section('content')
<div class="container">

  <!-- Begin main search form -->
 <div class="col-md-4">  <!-- begin search form block -->
	<div class="page-header">
		<h2>Search Form</h2>
	</div>
	{{ Form::open(array('action' => array('DogsController@index'), 'id' => 'ajax-form', 'class'=>'form width88', 'role'=>'search')) }}    

	<p class="text-info"><strong>Tip:</strong> Try Searching For Pugs In San Antonio</p>

		<br>
			<div class="col-sm-6 zero-pad-left">
				<label>Sex: </label>

					Female	{{ Form::radio('sex', 'F', false) }}
					Male	{{ Form::radio('sex', 'M', false) }}
			</div>

			<div class="col-sm-6">
				<label>Purebred: </label>
				  
					Yes 	{{ Form::radio('purebred', 'Y', false) }}
					No 		{{ Form::radio('purebred', 'N', false) }}
			</div>
		<br>
		<br>

		{{ Form::label('search-breed', 'Breed') }}
		{{ Form::select('search-breed', Breed::lists('name', 'id'), null, array('class' => 'form-group form-control dropdown btn btn-default')) }}
		
		<br>
		<br>
		
		{{ Form::label('search-zip', 'Enter Zip Code') }}
		{{ Form::text('search-zip', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter Zip Code...')) }}

		{{ Form::label('distance', 'Enter Search Radius') }}
		{{ Form::text('distance', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter Miles')) }}

		{{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn pull-right')) }}
	{{ Form::close() }}

  </div>   <!-- end left container -->

	<div class="col-md-8"> <!-- begin right container -->

		<div class="page-header">
			<h2 class="text-right">Map</h2>
		</div>

			<!-- Insert Google Map -->
			<div id="map-canvas"/>

	</div> <!-- end right container -->

<div class="col-md-12 zero-pad-left">
	<div class="page-header">
		<h2 class="text-right"> Result Details </h2>
	</div>

	<div id="results-list"></div> 	<!-- for each result, loop and create a new row like on dogs show, refactor accordingly. -->

</div>

</div><!-- end main container -->
</div><!-- extra div close for footer -->
@stop
</div>

@section('bottomscript')
<script type="text/javascript">


var mapOptions = {
  center: new google.maps.LatLng(29.4814305, -98.5144044),
  zoom: 10
};

var map = new google.maps.Map(document.getElementById("map-canvas"),
	mapOptions);

var markers = [];

// Add a marker to the map and push to the array.
function addMarker(location) {
  var marker = new google.maps.Marker({
    position: location,
    map: map,
    draggable: false,
    animation: google.maps.Animation.DROP
  });

  markers.push(marker);
}

// Sets the map on all markers in the array.
function setAllMap(map) {
  for (var i = 0; i < markers.length; i++) {
  		markers[i].setMap(map);
  		setTimeout((function(i) {

  		})(i), 1000);
  }
}

function setAllMapTimed(map) {
	// var marker;
	console.log(markers);

	for (i = 0; i < markers.length; i++) {
	    setTimeout((function (i) {
	        return function () {
	            marker = new google.maps.Marker({
	                position: new google.maps.LatLng(markers[i][1], markers[i][2]),
	                map: map,
	                draggable: false,
	                animation: google.maps.Animation.DROP,
	            });
	        };
	    })(i), 1000);
	}
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
  setAllMap(null);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
  clearMarkers();
  markers = [];
}

$('#ajax-form').on('submit', function (e) {
	e.preventDefault();
	var formValues = $(this).serialize();
	//console.log('formValues: ' + formValues);

	// Clear previous results if present
	$('#results-list').html('');

	// Send Ajax Request 
	$.ajax({
		url: "/search",
		type: "POST",
		data: formValues,
		dataType: "json",
		success: function (data) {
			// console.log(data);
			var count = 0;

			$(data).each(function() {
				count++;
				// console.log('=========');
				// console.log('Id: ' + this.id);
				// console.log('Breed: ' + this.breed.name);
				// console.log('Dog Name: ' + this.name);
				// console.log('Sex: ' + this.sex);
				// console.log('Age: ' + this.age);
				// console.log('Purebred? ' + this.purebred);
				// console.log('Owner: ' + this.user.username);
				// console.log('Lat: ' + this.user.lat);
				// console.log('Lng: ' + this.user.lng);
				// console.log('=========');
				// console.log(this.user.fullAddress);

				// additional syntax to update html with search results.
				$('#results-list').append(
					'<div class="row">' +
						'<div class="col-md-2">' +
							"<img src=\"" + this.img_path + "\" class=\"img-responsive thumbnail\" >" + 
						'</div>' +

						'<div class="zero-margin-left blog-block">' +
							'<div class="col-md-6">' +
								'<a href="http://ruff-love.com/dogs/' + this.id + '"><h3>' + this.name + '</a> | ' + '<a href="http://ruff-love.com/users/' + this.user.id + '">' + this.user.username + '</h3></a>' +
								'</div>' + 
								'</div>'
					);

				var address = this.user.fullAddress;
				// console.log(address);

				var geocoder = new google.maps.Geocoder();
				geocoder.geocode({ 'address': address }, function(result, status) {
					if (status == google.maps.GeocoderStatus.OK) {
						var latLngObj = result[0]["geometry"]["location"];
						// add marker to array
						addMarker(latLngObj);
					} // endif

					// COMMENTED OUT NON-WORKING CODE
					// // map: an instance of GMap3
					// // latlng: an array of instances of GLatLng
					// var latlngbounds = new google.maps.LatLngBounds();
					// markers.each(function(n){
					//    latlngbounds.extend(n);
					// });
					// map.setCenter(latlngbounds.getCenter());
					// map.fitBounds(latlngbounds);

				}); // end geocode address

			}); // end each data loop
			
			// Clear previous markers
			deleteMarkers();

			// Add all markers to map
			setAllMap(map);
			// setAllMapTimed(map);

		} // end data function
	}); // end .ajax

}); // end ajax-form block
</script>
@stop