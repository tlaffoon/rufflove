@extends('layouts.master')

@section('topscript')
<style>
  html, body, #map-canvas {
    height: 100%;
    margin: 0px;
    padding: 0px
  }
  #panel {
    position: absolute;
    top: 5px;
    left: 50%;
    margin-left: -180px;
    z-index: 5;
    background-color: #fff;
    padding: 5px;
    border: 1px solid #999;
  }
</style>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
@stop

@section('content')
<div class="page-header">
<h2>Example Geocode</h2>
</div>
<div id="panel">
  <input id="address" type="textbox" value="{{{ Auth::user()->address . ' ' . Auth::user()->city . ' ' . Auth::user()->state . ' ' . Auth::user()->zip }}}">
  <input type="button" value="Geocode" onclick="codeAddress()">
</div>
<div id="map-canvas"></div>
@stop

@section('bottomscript')
<script>

	var geocoder;
	var map;

function initialize() {
  var lat;
  var lng;

  geocoder = new google.maps.Geocoder();
	  var latlng = new google.maps.LatLng(lat, lng); // shouldn't be hardcoded
	  var mapOptions = {
	    zoom: 8,
	    center: latlng
	  }
	  map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);
	}

	function codeAddress() {
	  var address = document.getElementById('address').value;
	  geocoder.geocode( { 'address': address}, function(results, status) {
	    if (status == google.maps.GeocoderStatus.OK) {
	      map.setCenter(results[0].geometry.location);
	      var marker = new google.maps.Marker({
	          map: map,
	          position: results[0].geometry.location
	      });
	    } else {
	      alert('Geocode was not successful for the following reason: ' + status);
	    }
	  });
	}

		google.maps.event.addDomListener(window, 'load', initialize);
</script>

@stop