@extends('layouts.master')

@section('topscript')
@stop

@section('content')
<div class="container col-md-4">
	@if (!empty($dog->img_path))
		<img src="{{{ $dog->img_path }}}" class="img-responsive thumbnail centered">
	@else
		<img src="/img/placeholder-dog.png" class="img-responsive thumbnail centered">
	@endif
</div>

<div class="container col-md-6">
	<div class="page-header">
			<div class="btn-group pull-right admin-buttons">

				@if (Auth::user()->role == 'admin')

					<button type="button" class="btn btn-default btn-xs">
				  		<a href="{{ action('DogsController@index') }}"><span class="glyphicon glyphicon-home"></span></a>
					</button>

					<button type="button" class="btn btn-default btn-xs">
			  			<a href="{{ action('DogsController@edit', $dog->id) }}"><span class="glyphicon glyphicon-edit"></span></a>
					</button>

					<a href="#" class="deleteDog btn btn-xs btn-danger" data-dogid="{{ $dog->id }}"><span class="glyphicon glyphicon-remove-sign"></span></a>

				@endif
				
			</div>

	<h2>Dog: {{{ $dog->first_name . ' ' . $dog->last_name }}}</h2>

</div>

	<h5>Dogname: {{{ $dog->dogname }}}</h5>
	<h5>Email: {{{  $dog->email }}}</h5>
	<h5>Role: {{{ $dog->role }}}</h5>
	<h5>Created: {{{ $dog->created_at }}}</h5>
	<h5>Last Updated: {{{ $dog->updated_at }}}</h5>

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