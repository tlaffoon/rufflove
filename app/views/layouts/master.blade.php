<html>
<head>
	<title>Ruff Love</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/includes/css/bootstrap-amelia.css">
	<link rel="stylesheet" href="/includes/css/rufflove.css">	
	<link rel="icon" type="image/png" href="/includes/img/favicon.ico">
	<style type="text/css">
	.zero-margin-left {
		margin-left: 0px;
	}
	.zero-pad-left {
		padding-left: 0px;
	}
	.zero-pad-right {
		padding-right: 0px;
	}
	.width88 {
		width: 88%;
	}
	.search-bar-btn {
		float: right;
		position: relative;
		top: -53px;
		right: -115px;
	}
	.navbar {
		border-radius: 0px;
	}
	</style>

	@yield('topscript')

</head>
<body onload="">

    <!-- top navbar -->
		<div class="navbar navbar-default" role="navigation">
		  <div class="navbar-header">
		      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		      </button>
		      <a class="navbar-brand" href=""> RuffLove </a>
		    </div>

			<div class="navbar-collapse collapse">
		    	<ul class="nav navbar-nav navbar-left">
		    		<li><a href="{{ action('HomeController@showHome')}}">Home</a></li>
		    		<li><a href="{{ action('HomeController@showAbout')}}">About</a></li>
		    		<li><a href="{{ action('HomeController@showSearch')}}">Find A Breeding Partner</a></li>
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
		      	            	@if (Auth::user()->role == 'user')
			      	            	<li><a href=""> User Link </a></li>
		      	            		<li><a href="{{ action('DogsController@index') }}"> My Dogs </a></li>
		      	            		<li class="divider"></li>
		      	            	@endif		      	            	
		      	            <li><a href="{{ action('HomeController@doLogout') }}"> Logout </a></li>
		      	        </ul>
		      		</li>
		      		<li class="nav navbar-nav navbar-right">
		      			<p class="navbar-text">{{{ Auth::user()->username }}}</p>
		      		</li>
		        @else
		        	<li><a href="{{ action('HomeController@showRegistration') }}"> Sign Up </a></li>
		          	<li class="dropdown">
		              <a href="#" class="dropdown-toggle" data-toggle="dropdown"> Login <span class="caret"></span></a>
		          		<ul class="dropdown-menu embedded-form" role="menu" aria-labelledby="dropdownMenu1">
		          			<li role="presentation">
		          	  	    	{{ Form::open(array('action' => 'HomeController@doLogin', 'class'=>'navbar-form')) }}
		          	  	    	{{ Form::text('email', Input::old('email'), array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
		          	  	    	{{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Password')) }}
		          	  	    	<button class="btn btn-default navbar-btn pull-left">Forgot Password?</button>
		          	  			{{ Form::submit('Login', array('class' => 'btn btn-success navbar-btn')) }}
		          			</li>
		          		</ul>
		          	</li>
		        @endif
		      </ul>
		   
		  </div>
		</div> <!-- end navbar -->

		<!-- sidebar -->
<!--             <div class="col-xs-6 col-sm-2 sidebar-offcanvas" id="sidebar" role="navigation">
                <div data-spy="affix" data-offset-top="45" data-offset-bottom="90" class="">
                    <ul class="nav" id="sidebar-nav">
                        <li class='blackfont'><a href="#section1" class="">Sidebar</a>
                        </li>
                        <li><a href="#section2" class=""></a>
                        </li>
                        <li><a href="#section3" class=""></a>
                        </li>
                        <li><a href="#section4" class=""></a>
                        </li>
                        <li><a href="#section5" class=""></a>
                        </li>
                        <li><a href="#section6" class=""></a>
                        </li>
                    </ul>
                </div>
            </div> -->
            <!-- / .Main content -->
   
		<div class="container">

            @yield('content')

        </div>
	
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="/includes/js/typeahead.bundle.js"></script>
		<script src="/includes/js/bloodhound.js"></script>

			@yield('bottomscript')

</body>
</html>