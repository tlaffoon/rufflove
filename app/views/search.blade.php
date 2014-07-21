@extends ('layouts.master')

@section('topscript')

@stop

@section('content')

  <!-- Begin main search form -->
  <div class="col-md-12 zero-pad-left zero-pad-right"> 

    {{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }}    
      {{ Form::text('search', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter your search criteria here...')) }}
    {{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
    {{ Form::close() }} 
    
  </div> <!-- end main search form -->

  

  <!-- Begin breed search form -->
  <div class="col-md-12 zero-pad-left zero-pad-right"> 
    {{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 
    <div id="prefetch">
      {{ Form::text('search-breed', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Search by breed here...')) }}
      {{ Form::text('sex', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by sex here...')) }}
      {{ Form::text('miles', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by distance here...')) }}




    </div>
    {{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
    {{ Form::close() }} 
  </div> <!-- end breed search form -->





 <!-- <h2> GeoLocation Demo: User Location Tracking </h2>
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
</section> -->
@stop

@section('bottomscript')
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
@stop