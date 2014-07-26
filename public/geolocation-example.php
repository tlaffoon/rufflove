<html>
<head>
	<title> Geolocate Me </title>
	<style type="text/css">
	  #map-canvas { 
	  	height: 75%;
	  	width: 75%;
	  }
	</style>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>

</head>
<body>


<h2> Click the allow button to let the browser find your location. </h2>

	<div>
		<div id="map-canvas"/>
	</div>

	<div>
		<p id="address"></p>
	</div>

<script type="text/javascript">
function success(position) {

	var coords = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);

	var mapOptions = {
		zoom: 16,
		center: coords,
		mapTypeControl: false,
		navigationControlOptions: { style: google.maps.NavigationControlStyle.SMALL },
		mapTypeId: google.maps.MapTypeId.ROADMAP
	};

	var map = new google.maps.Map(document.getElementById('map-canvas'),
        mapOptions);

  	var marker = new google.maps.Marker({
    	position: coords,
    	map: map,
    	title:"You are here!"
  });
}

	$(document).ready( function () {
		console.log('DOM Loaded.');

		if (navigator.geolocation) {
				navigator.geolocation.getCurrentPosition(success);
		} 
		else {
				console.log('Geo Location is not supported with your browser.');
		}
	});



</script>
</body>
</html>