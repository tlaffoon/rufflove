@extends('layouts.master')

@section('content')

<div class="container">

	<div class="jumbotron">
	  <h1>Ruff Love</h1>
	  <p>Dating For Dogs</p>
	  <p><a class="btn btn-primary btn-lg" role="button">Sign Up</a></p>
	</div>

	<div class="col-md-12"> <!-- Begin main search form -->

		{{ Form::open(array('action' => array('PostsController@index'), 'class'=>'form-inline', 'role'=>'search', 'method' => 'GET')) }}    
		{{ Form::text('search', null, array('class' => 'form-group form-control')) }}
		{{ Form::submit('Search', array('class' => 'btn btn-default pull-right')) }}
		{{ Form::close() }}	
		
	</div>

</div>

@stop

@section('bottomscript')
@stop