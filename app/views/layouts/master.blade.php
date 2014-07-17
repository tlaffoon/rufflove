<html>
<head>
	<title>Ruff Love</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-amelia.css">
	<link rel="stylesheet" href="/css/rufflove.css">
	
	<style type="text/css">
	.zero-margin-left {
		margin-left: 0px;
	}
	</style>

	@yield('topscript')

</head>

<body>
		<div class="navbar navbar-default" role="navigation">
		  <div class="container">
		    <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		      </button>
		      <a class="navbar-brand" href=""> RuffLove </a>
		    </div>
		    <div class="navbar-collapse collapse">

		      <ul class="nav navbar-nav navbar-left">
		    	  <li><a href="">Home</a></li>
		      </ul>

		      @if (Auth::check())
		        <ul class="nav navbar-nav navbar-left">
		      	  <li><a href=""> Admin Link </a></li>
		        </ul>
		      @endif

		      <ul class="nav navbar-nav navbar-right">
		      	@if (Auth::check())
		      		<li class="dropdown">
		      	      <a href="#" class="dropdown-toggle" data-toggle="dropdown"> My Account <span class="caret"></span></a>
		      	        <ul class="dropdown-menu" role="menu">
		      	        	<li class="dropdown-header">{{ Auth::user()->username }}</li>
		      	            <li><a href="{{ action('UsersController@edit', Auth::user()->id) }}"> My Profile </a></li>
		      	            <li class="divider"></li>
		      	            	@if (Auth::user()->role == 'admin')
			      	            	<li><a href=""> Admin Link </a></li>
		      	            		<li><a href="{{ action('UsersController@index') }}"> User Administration </a></li>
		      	            		<li class="divider"></li>
		      	            	@endif
		      	            <li><a href=""> Logout </a></li>
		      	        </ul>
		      		</li>
		      		<li class="nav navbar-nav navbar-right">
		      			<p class="navbar-text">{{{ Auth::user()->username }}}</p>
		      		</li>
		        @else
		          	<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login <span class="caret"></span></a>
		          		<ul class="dropdown-menu embedded-form" role="menu" aria-labelledby="dropdownMenu1">
		          			<li role="presentation">
		          	    		<a role="menuitem" tabindex="-1" href="#">
		          	  	    	{{ Form::open(array('action' => 'HomeController@doLogin', 'class'=>'navbar-form')) }}
		          	  	    	{{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
		          	  	    	{{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
		          	  			{{ Form::submit('Login', array('class' => 'btn btn-success navbar-btn')) }}
<!-- 		          	  			 <button class="btn btn-default navbar-btn pull-left">Forgot Password?</button>
 -->		          	  	    	{{ Form::close() }}
		          				</a>
		          			</li>
		          		</ul>
		          	</li>
		        @endif
		      </ul>
		    </div><!--/.nav-collapse -->
		  </div>
		</div>
		
		<div class="container-fluid">
	@if (Session::has('successMessage'))
	    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
	@endif

	@if (Session::has('errorMessage'))
	    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
	@endif

			@yield('content')

		</div>
	
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			@yield('bottomscript')

</body>
</html>