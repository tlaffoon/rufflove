@extends('layouts.master')

@section('content')

	<div class="jumbotron container">
		<div class="row">
			<div class="col-md-6">
				<h1> Ruff Love </h1>
				  <p><span class="glyphicon glyphicon-heart"></span> Dating For Dogs</p>
				  <p><a class="btn btn-primary btn-lg" role="button">Sign Up</a></p>
			</div>
			<div class="col-md-6">
	  		<img id="pups" src="includes
	  		/img/puppylove.png" class="img-responsive thumbnail">
			  </div>
		</div>
	  	<!--   -->	
	</div>

	<div class="col-md-12 zero-pad-left zero-pad-right"> <!-- Begin main search form -->

		{{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }}    
		{{ Form::text('search', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter your search criteria here...')) }}
		{{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
		{{ Form::close() }}	
		
	</div> <!-- end main search form -->

	<div class="col-md-12 zero-pad-left zero-pad-right"> <!-- Begin breed search form -->
		{{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 
		<div id="prefetch">
			{{ Form::text('search', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Search by breed here...')) }}
		</div>
		{{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
		{{ Form::close() }}	
	</div> <!-- end breed search form -->


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