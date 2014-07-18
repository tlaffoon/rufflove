@extends('layouts.master')

@section('topscript')

@stop

@section('content')

<div class="col-md-2"></div>

<div class="page-header">
<h2>Testing Geocode</h2>
</div>

<p> {{{ $user }}} </p>

<p>Straight from DB: {{{ $user->address . ' ' . $user->city . ' ' . $user->state . ' ' . $user->zip }}}</p>

<!-- http://maps.google.com/maps/api/geocode/json?address=112+pecan+street,+san+antonio,+TX -->

<!-- str_replace(find,replace,string,count) -->
<p>
<?php 

$fullAddress = $user->address . ' ' . $user->city . ' ' . $user->state . ' ' . $user->zip;
echo "<p>$fullAddress</p>";
$formattedAddress = strtolower(str_replace(' ', '+', $fullAddress));
echo "<p>$formattedAddress</p>";

?>
</p>
<p> preformatted url before api request: http://maps.google.com/maps/api/geocode/json?address={{{ $formattedAddress }}}</p>

<p><address> {{{ $formattedAddress }}} </address></p>

<!-- Need to get json object returned, with javascript? -->

@stop

@section('bottomscript')
<script type="text/javascript">

// The basic architecture for a server-side geocoding application is the following:

// A server based application sends an address to the server's geocoding script.
// The script checks the cache to see if the address has recently been geocoded.
// If it has, the script returns that geocode to the original application.
// If it has not, the script sends a geocoding request to Google. Once it has a result, it caches it, and then returns the geocode to the original application.
// Sometime later, the geocode is used to display data on a Google Map.


// You access the Google Maps API geocoding service within your code via the google.maps.Geocoder object. The Geocoder.geocode() method initiates a request to the geocoding service, passing it a GeocodeRequest object literal containing the input terms and a callback method to execute upon receipt of the response.

// http://stackoverflow.com/questions/1300838/how-to-convert-an-address-into-a-google-maps-link-not-map

$(document).ready(function () {
   //Convert address tags to google map links - Michael Jasper 2012
   $('address').each(function () {
      var link = "<a href='http://maps.google.com/maps?q=" + encodeURIComponent( $(this).text() ) + "' target='_blank'>" + $(this).text() + "</a>";
      $(this).html(link);
   });
});
</script>

<script type="text/javascript">
// generates a map within iframe
// $(document).ready(function(){
//     $("address").each(function(){                         
//         var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
//         $(this).html(embed);             
//     });
// });
</script>
@stop