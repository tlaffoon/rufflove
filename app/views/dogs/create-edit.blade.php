@extends('layouts.updated-master')

@section('topscript')
<style>
.tt-dropdown-menu {
	background: dodgerblue;
	width: 195px;
	color: white;
}
</style>
@stop

@section('content')
<div class="container">

<div class="col-md-6">

<div class="clearfix"></div>

<div class="page-header">
		<div class="btn-group pull-right admin-buttons">

				<button type="button" class="btn btn-default">
			  		<a href="{{ action('DogsController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
				</button>
			@if (isset($dog))
				<button type="button" class="btn btn-default">
			  		<a href="{{ action('DogsController@show', $dog->id) }}"><span class="glyphicon glyphicon-zoom-in"></span></a>
				</button>
			@endif
			
			@if (Auth::user()->role == 'admin' && isset($dog))

				<a href="#" class="deleteDog btn btn-danger" data-dogid="{{ $dog->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

			@endif
			
		</div>

	@if (isset($dog))
			<h2>Edit Dog: {{{ $dog->name }}}</h2>
		{{ Form::model($dog, array('action' => array('DogsController@update', $dog->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
	@else
			<h2>Create New Dog</h2>
		{{ Form::open(array('action' => 'DogsController@store'), array('files' => true))}}
	@endif
	</div>

	<div class="clearfix"></div>

	{{ Form::label('name', 'Name') }}
	{{ Form::text('name', Input::old('name'), array('class' => 'form-group form-control', 'placeholder' => 'Name')) }}
	{{ $errors->first('name', '<span class="help-block text-danger text-right">:message</span><br>') }}

	<div class="form-group zero-left-margin">
	{{ Form::label('owner', 'Owner') }}
	{{ Form::select('owner', User::lists('username', 'id'), null, array('class' => 'form-group form-control dropdown btn btn-default')) }}
	</div>

	{{ Form::label('age', 'Age') }}
	{{ Form::text('age', Input::old('age'), array('class' => 'form-group form-control', 'placeholder' => 'Age')) }}
	{{ $errors->first('age', '<span class="help-block"><p class="text-danger text-right">:message</p></span><br>') }}

	{{ Form::label('weight', 'Weight') }}
	{{ Form::text('weight', Input::old('weight'), array('class' => 'form-group form-control', 'placeholder' => 'Weight')) }}
	{{ $errors->first('last_name', '<span class="help-block"><p class="text-danger text-right">:message</p></span><br>') }}

	<div class="form-group zero-left-margin">
		{{ Form::label('sex', 'Sex') }}
		{{ Form::select('sex', array('M' => 'Male', 'F' => 'Female'), 'M', array('class' => 'form-group form-control dropdown btn btn-default')) }}	
	</div>

	<div class="form-group zero-left-margin">
		{{ Form::label('purebred', 'Purebred') }}
		{{ Form::select('purebred', array('Y' => 'Y', 'N' => 'N'), 'Y', array('class' => 'form-group form-control dropdown btn btn-default')) }}	
	</div>


	<div class="form-group zero-left-margin">
	{{ Form::label('breed', 'Breed') }}
	{{ Form::select('breed', Breed::lists('name', 'id'), null, array('class' => 'form-group form-control dropdown btn btn-default')) }}
	</div>

	{{ Form::submit('Save', array('class' => 'btn btn-success pull-right')) }}

</div> <!-- end left container -->

<div class="col-md-6">
	<div class="page-header">
		<h2 class="text-right">Image Preview</h2>
	</div>

	@if (isset($dog))
		<div> <!-- $dog->image()->first()->path -->
			<img src="{{{ $dog->img_path }}}">
		</div>
	@endif

	<div class="form-group zero-left-margin">
	{{ Form::label('image', 'Image') }}

	{{ Form::file('image', array('class' => 'form-group button-space-top')) }}
	{{ $errors->first('image', '<span class="help-block"><p class="text-danger text-right">:message</p></span><br>') }}

	{{ Form::close() }}
	</div>

</div> <!-- end right container -->

{{ Form::open(array('action' => 'DogsController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
{{ Form::close() }}

</div>
@stop

@section('bottomscript')
<script type="text/javascript">
$(".deleteDog").click(function() {
	var dogid = $(this).data('dogid');
	$("#deleteForm").attr('action', '/dogs/' + dogid);
	if (confirm("Are you sure you want to delete this dog?")) {
		$('#deleteForm').submit();
	}
});

</script>
@stop