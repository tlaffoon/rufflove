@extends ('layouts.updated-master')

@section('topscript')
@stop

@section('content')
<!-- ========================================================================== -->
<!-- OLD WORKING CODE -->
  <!-- Begin main search form -->
 <div class="container col-md-12 zero-pad-left zero-pad-right"> 

  {{ Form::open(array('action' => array('DogsController@index'), 'id' => 'ajax-form', 'class'=>'form width88', 'role'=>'search')) }}    
      <h3>Search for dog by name</h3>
      {{ Form::text('search-name', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by individual dog name here...')) }}
    
    <!-- end main search form -->

    <!-- Begin breed search form -->
    {{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 

            
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
  </div>  
  <!-- end breed search form -->

@stop

@section('bottomscript')
<script type="text/javascript">
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
            $(data).each(function() {
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

            });
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