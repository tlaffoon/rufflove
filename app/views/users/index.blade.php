@extends('layouts.master')

@section('content')
<div class="container col-md-12">

<p><a class="btn btn-success btn-block" href="{{ action('UsersController@create') }}"> Create New User </a></p>

<table class="table table-striped fixed">
	<tr>
		<th width="20px">ID</th>
		<th>Username</th>
		<th>Full Name</th>
		<th>Role</th>
		<th># Posts</th>
		<th width="220px">Actions</th>
	</tr>

	@foreach ($users as $user)
	<tr>
		<td>{{{ $user->id }}}</td>
		<td>{{{ $user->username }}}</td>
		<td>{{{ $user->first_name . ' ' . $user->last_name }}}</td>
		<td>{{{ ucfirst($user->role) }}}</td>
		<td>{{{ count($user->posts) }}}</td>
		<td>
			<div class="btn-group">
				<button type="button" class="btn btn-default">
			  		<a href="{{ action('UsersController@show', $user->id) }}"><span class="glyphicon glyphicon-zoom-in"></span></a>
				</button>

				<button type="button" class="btn btn-default">
					<a href="{{ action('UsersController@edit', $user->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
				</button>				

				<a href="#" class="deleteUser btn btn-danger" data-userid="{{ $user->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

			</div>
		</td>
	</tr>
	@endforeach
</table>
		{{ Form::open(array('action' => 'UsersController@destroy', 'id' => 'deleteForm', 'method' => 'DELETE')) }}
		{{ Form::close() }}

	<div class="centered">{{ $users->links() }}</div>	

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