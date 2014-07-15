@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container col-md-4">
	@if (!empty($user->img_path))
		<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail centered">
	@else
		<img src="/img/placeholder-user.png" class="img-responsive thumbnail centered">
	@endif
</div>

<div class="container col-md-6">
	<div class="page-header">
			<div class="btn-group pull-right admin-buttons">

				@if (Auth::user()->role == 'admin')

					<button type="button" class="btn btn-default btn-xs">
				  		<a href="{{ action('UsersController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
					</button>

					<button type="button" class="btn btn-default btn-xs">
			  			<a href="{{ action('UsersController@edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					</button>

					<a href="#" class="deleteUser btn btn-xs btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
				
			</div>

	<h2>User: {{{ $user->first_name . ' ' . $user->last_name }}}</h2>

</div>

	<h5>Username: {{{ $user->username }}}</h5>
	<h5>Email: {{{  $user->email }}}</h5>
	<h5>Role: {{{ $user->role }}}</h5>
	<h5>Created: {{{ $user->created_at }}}</h5>
	<h5>Last Updated: {{{ $user->updated_at }}}</h5>

</div>

	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
	{{ Form::close() }}

</div>
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