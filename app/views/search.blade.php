@extends ('layouts.updated-master')

@section('topscript')
<style type="text/css">
#map-canvas { 
    height: 500px;
}

ul {
/*    visibility: hidden;
*/}
</style>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?v=3"></script>
@stop

@section('content')

<div class="container">

  <!-- Begin main search form -->
 <div class="col-md-4">  <!-- begin search form block -->
    <div class="page-header">
        <h2>Search Form</h2>
    </div>
  {{ Form::open(array('action' => array('DogsController@index'), 'id' => 'ajax-form', 'class'=>'form width88', 'role'=>'search')) }}    
      {{ Form::text('search-name', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by individual dog name here...')) }}
    
    {{ Form::text('search-zip', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter Zip Code...')) }}

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

  </div>   <!-- end left container -->

  <div class="col-md-8">

    <div class="page-header">
        <h2 class="text-right">Map</h2>
    </div>
        <div id="map-canvas"/>
  </div> <!-- end right container -->

<div class="col-md-10 zero-pad-left">
    <p> Placeholder For Results Display </p>
</div>

</div><!-- end main container -->
</div><!-- extra div close for footer -->
@stop

@section('bottomscript')
<script type="text/javascript">

var mapOptions = {
  center: new google.maps.LatLng(29.4814305, -98.5144044),
  zoom: 10
};

var map = new google.maps.Map(document.getElementById("map-canvas"),
    mapOptions);


$('#ajax-form').on('submit', function (e) {
    e.preventDefault();
    var formValues = $(this).serialize();
    console.log('formValues: ' + formValues);

    $.ajax({
        url: "/search",
        type: "POST",
        data: formValues,
        dataType: "json",
        success: function (data) {
            console.log(data);
            // $('#ajax-message').html(data.message);
            var count = 0;
            $(data).each(function() {
                count++;
                console.log('=========');
                console.log('Id: ' + this.id);
                console.log('Breed: ' + this.breed.name);
                console.log('Dog Name: ' + this.name);
                console.log('Sex: ' + this.sex);
                console.log('Age: ' + this.age);
                console.log('Purebred? ' + this.purebred);
                console.log('Owner: ' + this.user.username);
                console.log('Lat: ' + this.user.lat);
                console.log('Lng: ' + this.user.lng);
                console.log('=========');
                console.log(this.user.fullAddress);

                var address = this.user.fullAddress;
                console.log(address);

                var geocoder = new google.maps.Geocoder();
                geocoder.geocode({ 'address': address }, function(result, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        //console.log(result);
                        // $('#latitude').val(result[0]["geometry"]["location"]["k"]);  // need to call functions instead of these variables
                        // $("#longitude").val(result[0]["geometry"]["location"]["B"]); //  ^
                        var latLngObj = result[0]["geometry"]["location"];
                    } // endif


                    // additional syntax to update html with search results.


                    // Create new marker based on lat/lng
                    var marker = new google.maps.Marker({
                        position: latLngObj,
                        map: map,
                        draggable: false,
                        title: "Marker"
                        // animation: google.maps.Animation.DROP, // debug and add
                    });  // End Marker
                }); // end function

            }); // end main loop
        }
    });
}); // end ajax form submit block
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
@stop