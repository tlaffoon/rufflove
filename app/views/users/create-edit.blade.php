@extends.layout('master')

@section('topscript')
@stop

@section('content')
<div class="container col-md-6">

<div class="clearfix"></div>

<div class="page-header">
		<div class="btn-group pull-right admin-buttons">

				<button type="button" class="btn btn-default btn-xs">
			  		<a href="{{ action('UsersController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
				</button>
			
			@if (Auth::user()->role == 'admin')
				@if (isset($user))

				<button type="button" class="btn btn-default btn-xs">
		  			<a href="{{ action('UsersController@edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
				</button>

				<a href="#" class="deleteUser btn btn-xs btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
			@endif
			
		</div>

	@if (isset($user))
			<h2>Edit User: {{{ $user->username }}}</h2>
		{{ Form::model($user, array('action' => array('UsersController@update', $user->id), 'class'=>'form', 'role'=>'form', 'method' => 'PUT', 'files' => true)) }}
	@else
			<h2>Create New User</h2>
		{{ Form::open(array('action' => 'UsersController@store'), array('files' => true))}}
	@endif
	</div>

	{{ Form::token() }}

	<div class="clearfix"></div>

	{{ Form::label('username', 'Username') }}
	{{ Form::text('username', Input::old('username'), array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
	{{ $errors->first('username', '<span class="help-block text-warning">:message</span><br>') }}

	{{ Form::label('password', 'Password') }}
	{{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
	{{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::label('email', 'Email') }}
	{{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
	{{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::label('first_name', 'First Name') }}
	{{ Form::text('first_name', Input::old('first_name'), array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
	{{ $errors->first('first_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	{{ Form::label('last_name', 'Last Name') }}
	{{ Form::text('last_name', Input::old('last_name'), array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
	{{ $errors->first('last_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	<div class="form-group zero-left-margin">

	{{ Form::label('role', 'Role') }}
	{{ Form::select('role', array('user' => 'User', 'admin' => 'Admin'), 'user', array('class' => 'form-group form-control dropdown btn btn-default')) }}
	
	</div>

	<div class="form-group zero-left-margin">

	{{ Form::label('image', 'Image') }}

	{{ Form::file('image', array('class' => 'form-group button-space-top')) }}
	{{ $errors->first('image', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

	</div>


	{{ Form::submit('Save', array('class' => 'btn btn-success pull-right')) }}
	{{ Form::close() }}

	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
	{{ Form::close() }}

</div> <!-- end main container -->
@stop

@section('bottomscript')
<script type="text/javascript">
$(".deleteUser").click(function() {
	var userid = $(this).data('userid');
	$("#deleteForm").attr('action', '/users/' + userid);
	if (confirm("Are you sure you want to delete this user?")) {
		$('#deleteForm').submit();
	}
});
</script>
@stop