	<!-- Begin breed search form -->
	<div class="col-md-12 zero-pad-left zero-pad-right"> 
		{{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 
		<div id="prefetch">
			{{ Form::text('search-breed', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Search by breed here...')) }}
			{{ Form::text('sex', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by sex here...')) }}
			{{ Form::text('miles', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by distance here...')) }}
		</div>
	</div>

		<!-- Begin main search form -->
	<div class="col-md-12 zero-pad-left zero-pad-right"> 

		{{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }}    
		{{ Form::text('search', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter your search criteria here...')) }}
		{{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
		{{ Form::close() }}	
		
	</div> <!-- end main search form -->



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