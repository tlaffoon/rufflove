@extends('layouts.homepage')

@section('topscript')
@stop

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

	<div class="clearfix"></div>

	<div class="col-md-12 zero-margin-left zero-pad-left">
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
		<div class="col-md-4 zero-margin-left zero-pad-left"><img src="http://placehold.it/332x200"></div>
	</div>
@stop

@section('bottomscript')
@stop