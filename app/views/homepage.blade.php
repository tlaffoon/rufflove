@extends('layouts.homepage')

@section('content')
	<div id="main-header" class="jumbotron">
		<div class="row">
			<div class="col-md-6">
				<h1 id="main-header-text"> Ruff Love </h1>
				  <p id="main-header-slogan"><span class="glyphicon glyphicon-heart"></span> Dating For Dogs</p>
				  <p><a class="btn btn-primary btn-lg" role="button">Search!</a></p>
			</div>
			<div class="col-md-6">
	  		<img id="pups" src="/includes/img/puppylove.png" class="img-responsive thumbnail">
			  </div>
		</div>
	</div>

	<div class="clearfix"></div>

	<div class="col-md-12 zero-margin-left zero-pad-left">
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
	</div>
@stop

@section('bottomscript')
<script type="text/javascript">
	// var breeds = new Bloodhound({
	//   datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
	//   queryTokenizer: Bloodhound.tokenizers.whitespace,
	//   limit: 10,
	//   prefetch: {
	//     url: '/includes/data/breeds.json',
	//     filter: function(list) {
	//       return $.map(list, function(breed) { return { name: breed }; });
	//     }
	//   }
	// });
	 
	// // kicks off the loading/processing of `local` and `prefetch`
	// breeds.initialize();
	 
	// // passing in `null` for the `options` arguments will result in the default
	// // options being used
	// $('#prefetch .typeahead').typeahead(null, {
	//   name: 'breeds',
	//   displayKey: 'name',
	//   // `ttAdapter` wraps the suggestion engine in an adapter that
	//   // is compatible with the typeahead jQuery plugin
	//   source: breeds.ttAdapter()
	// });
</script>
@stop