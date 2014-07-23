@extends ('layouts.updated-master')

@section('topscript')
@stop

@section('content')

<section id="wrapper">

 <h2> GeoLocation Demo: User Location Tracking </h2>
<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
    <article>
      <p>Finding your location: <span id="status">checking...</span></p>
    </article>
<script>
function success(position) {
  var p = document.querySelector('#status');
  
  if (p.className == 'success') {
    // not sure why we're hitting this twice in FF, I think it's to do with a cached result coming back    
    return;
  }
  
  p.innerHTML = "found you!";
  p.className = 'success';
  
  var usermap = document.createElement('div');
  usermap.id = 'usermap';
  usermap.style.height = '400px';
  usermap.style.width = '400px';
  usermap.style.border = '1px solid #000000';
    
  document.querySelector('article').appendChild(usermap);
  
  var latlng = new google.maps.LatLng(position.coords.latitude, position.coords.longitude);
  var myOptions = {
    zoom: 15,
    center: latlng,
    mapTypeControl: false,
    navigationControlOptions: {style: google.maps.NavigationControlStyle.SMALL},
    mapTypeId: google.maps.MapTypeId.ROADMAP
  };
  var map = new google.maps.Map(document.getElementById("usermap"), myOptions);
  
  var marker = new google.maps.Marker({
      position: latlng, 
      map: map, 
      title:"You are here! (at least within a "+position.coords.accuracy+" meter radius)"
  });
}

function error(msg) {
  var s = document.querySelector('#status');
  s.innerHTML = typeof msg == 'string' ? msg : "failed";
  s.className = 'fail';
  
  // console.log(arguments);
}

if (navigator.geolocation) {
  navigator.geolocation.getCurrentPosition(success, error);
} else {
  error('not supported');
}


</script>
</section>
@stop

@section('bottomscript')
@stop