@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container col-md-2">
<!-- 		<img src="/includes/img/placeholder-dog.png" class="img-responsive thumbnail centered">
 --></div>

<div class="container col-md-10">
	<div class="page-header">
			<div class="btn-group pull-right admin-buttons">

				@if (Auth::user()->role == 'admin')

					<button type="button" class="btn btn-default">
				  		<a href="{{ action('DogsController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
					</button>

					<button type="button" class="btn btn-default">
			  			<a href="{{ action('DogsController@edit', $dog->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					</button>

					<a href="#" class="deleteDog btn btn-danger" data-dogid="{{ $dog->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
				
			</div>

	<h2>{{{ $dog->name }}}</h2>

</div>

	<h4>Owner: 		<a href="{{{ action('UsersController@show', $dog->user->id) }}}">{{{ $dog->user->username }}}	</a></h4>
	<h4>Breed: 		{{{ $dog->breed->name }}}		</h4>
	<h4>Purebred: 	{{{ $dog->purebred }}}			</h4>
	<h4>Age: 		{{{ $dog->age }}}				</h4>
	<h4>Weight: 	{{{ $dog->weight }}}			</h4>
	<h4>Sex: 		{{{ $dog->sex }}}				</h4>
	<h4>Updated: 	{{{ $dog->updated_at }}}		</h4>
<!-- 	<h4>Image Path: {{{ $dog->image()->first()->path }}}			</h4> -->
</div>

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