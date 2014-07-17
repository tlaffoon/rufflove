@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container col-md-2">
	<div class="test	">
	@if (!empty($user->img_path))
		<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail centered">
	@else
		<img src="/img/placeholder-user.png" class="img-responsive thumbnail centered">
	@endif
	</div>
</div>

<div class="container col-md-6">
	<div class="page-header">
			<div class="btn-group pull-right admin-buttons">

				@if (Auth::user()->role == 'admin')

					<button type="button" class="btn btn-default">
				  		<a href="{{ action('UsersController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
					</button>

					<button type="button" class="btn btn-default">
			  			<a href="{{ action('UsersController@edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					</button>

					<a href="#" class="deleteUser btn btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
				
			</div>

		<h2>{{{ $user->username }}}</h2>
	</div>

	<h4>Full Name: 	{{{ $user->first_name . ' ' . $user->last_name }}}	</h4>
	<h4>Email: 		{{{ $user->email }}}								</h4>
	<h4>Role: 		{{{ $user->role }}}									</h4>
	<h4>Address: 	{{{ $user->address }}}								</h4>
	<h4>City: 		{{{ $user->city }}}									</h4>
	<h4>State: 		{{{ $user->state }}}								</h4>
	<h4>Zip: 		{{{ $user->zip }}}									</h4>
	<h4>Updated: 	{{{ $user->updated_at }}}							</h4>


	{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
	{{ Form::close() }}

	<div class="page-header">
		<h2>{{{ $user->username . '\'s dogs' }}}</h2>
	</div>

@foreach ($user->dogs as $dog)

	<div class="row">
 	      		<img src="{{{ $dog->img_path }}}" alt="$dog->name">
 	        		<h3> {{{ $dog->name }}}</h3>
	        		<p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
	        		<a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
	</div> <!-- end row -->
@endforeach
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