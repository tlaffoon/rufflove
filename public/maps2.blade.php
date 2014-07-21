@extends('layouts.map-layout')

<head>
	<title>Demo Google Maps Page</title>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3Q4UzAfKDUWGr-KbI3nj19LxBstHbRZY"></script>
	@section('topscript')
	<script type="text/javascript">
	  	function googleMaps (lat, lng, zoom) {
	  		// create new geocoder instance 
			geocoder = new google.maps.Geocoder(); 
			// define myLatlng according to function input
			var myLatlng = new google.maps.LatLng(lat, lng);
			// define maps options
			var myOptions = {
			  // use zoom value from parameter input 
			  zoom: zoom,
			  // center on myLatlng defined above
			  center: myLatlng, 
			  // Define map type as road
			  mapTypeId: google.maps.MapTypeId.ROAD 
			} 
			
			// Identify div where maps will populate 'map_canvas'
			map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
			// Define new marker instance
			var marker = new google.maps.Marker({ 
				// position marker on value define above
				position: myLatlng,  
				// use map instance defined above
				map: map 
			}); 
			
			// Add event listener on map to update page form with lat/lng values when they change
			google.maps.event.addListener(map, "center_changed", function(){ 
			  document.getElementById("latitude").value = map.getCenter().lat(); 
			  document.getElementById("longitude").value = map.getCenter().lng(); 
			  marker.setPosition(map.getCenter()); 
			  document.getElementById("zoom").value = map.getZoom(); 
			}); 

			// Add event listener on map to update page form with zoom value when it changes
			google.maps.event.addListener(map, "zoom_changed", function(){ 
			  document.getElementById("zoom").value = map.getZoom(); 
			});

			// Custom function to run when address value changes
			$("#address").change(function(){ 
				// instigate new geocoder instance with updated address value
			  	geocoder.geocode({"address": $(this).attr("value")}, function(results, status) { 
			  		// Recenter map with zoom 10 on new address, if status of geocoder is OK
			    	if (status == google.maps.GeocoderStatus.OK) { 
			      		map.setZoom(10); 
			      		map.setCenter(results[0].geometry.location); 
			    	} 
			    	// Output errors otherwise
			    	else { 
			      		alert("Geocode was not successful for the following reason: " + status); 
			    	}
			  	});  // end geocoder
			});  // end custom address function

	  	} // end custom google maps function

	  	// Initialize map with function googleMaps on window load
	  	google.maps.event.addDomListener(window, 'load', googleMaps);
	</script>
	@stop
</head>

@section('content')
	<div class="col-md-5">
	    <div class="page-header">
	        <h2> Google Maps Integration </h2>
	    </div>
	      <h3>Please enter address:</h3>
	            <input type="text" id="address" name="address" class="form-control form-group width80" value="339 Mahogany Chest, San Antonio, TX, 78249" placeholder="">
	            <button id="addr-btn" class="btn btn-default" action="submit">Submit</button>
	    <br>

	    <form>
	    	<input id="lati" name="latitude" class="form-group form-control" placeholder="Latitude" value="">
	    	<input id="long" name="longitude" class="form-group form-control" placeholder="Longitude" value="">
	    </form>

	</div> <!-- end left container -->

	<div class="col-md-7">
	    <div class="page-header text-right">
	        <h2>Sample Map</h2>
	    </div>

		<div id="map_canvas"></div>

	</div> <!-- end right container -->
@stop

@section('bottomscript')
<script type="text/javascript">
</script>

@stop





