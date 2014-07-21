@extends('layouts.master')

@section('topscript')
@stop

@section('content')

@stop

@section('bottomscript')
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC3Q4UzAfKDUWGr-KbI3nj19LxBstHbRZY"></script>
<script type="text/javascript">

var mapOptions = {
    center : new google.maps.LatLng(29.4284595, -98.492433),
    zoom : 13,
    mapTypeId : google.maps.MapTypeId.ROADMAP
};

// var map = new google.maps.Map(document.getElementById('map'), mapOptions);


$('#addr-btn').click(function () {
  var address = $('#addr-value').val();
  console.log(address);
  $('#address-text').text('You entered: ' + address);
  $('#address').text(address);

  var geocoder = new google.maps.Geocoder();
  geocoder.geocode({ 'address': address }, function(result, status) {
    if (status == google.maps.GeocoderStatus.OK) {
      console.log(result);
    }

    $("address").each(function(){                         
        var embed ="<iframe width='425' height='350' frameborder='0' scrolling='no'  marginheight='0' marginwidth='0' src='https://maps.google.com/maps?&amp;q="+ encodeURIComponent( $(this).text() ) +"&amp;output=embed'></iframe>";
        $(this).html(embed);
    });


  }); // end event from button click



});
</script>

<script type="text/javascript">
//   function initialize() {
//     var mapOptions = {
//       center: new google.maps.LatLng(-34.397, 150.644),
//       zoom: 8
//     };
//     var map = new google.maps.Map(document.getElementById("map-canvas"),
//         mapOptions);
//   }
//   google.maps.event.addDomListener(window, 'load', initialize);
</script>
@stop



