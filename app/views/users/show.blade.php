@extends('layouts.master')

@section('topscript')
<style type="text/css">
.test {
	position: relative;
	margin-top: 92px;
	float: right;
}
</style>
@stop

@section('content')
<div class="container col-md-2">
	<div class="test">
		<img src="{{{ $user->img_path }}}" class="img-responsive thumbnail centered">
	</div>
</div>


<div class="container col-md-10">
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

	</div>


<div class="col-md-2"></div>
<div class="col-md-10">
	<div class="page-header">
		@if (Auth::check())
		<h2>{{{ $user->username . '\'s dogs' }}}</h2>
		@endif
	</div>
	<button type="button" class="btn btn-default">
			<a href="{{ action('DogsController@create') }}"><span class="glyphicon glyphicon-plus"></span></a>
	</button>
</div>

@foreach ($user->dogs as $dog)

  <div class="row">

  	<div class="col-md-2"></div> <!-- fills sidebar space -->
  	
  	<div class="col-md-2">

  	        @if ($dog->img_path )
  	          <img src="{{{ $dog->img_path }}}" class="img-responsive thumbnail pull-right" alt="$dog->img_path">
  	        @else
  	          <img src="/includes/img/placeholder.png" class="img-responsive thumbnail pull-right" alt="$dog->img_path">
  	        @endif

  	</div>

    <div class="zero-margin-left blog-block">
      
      <div class="col-md-6">
        <h3>{{{ $dog->name }}}</h3>
        <p>Cras justo odio, dapibus ac facilisis in, egestas eget quam. Donec id elit non mi porta gravida at eget metus. Nullam id dolor id nibh ultricies vehicula ut id elit.</p>
      </div>

    </div>
  </div> <!-- end row -->

  @endforeach

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