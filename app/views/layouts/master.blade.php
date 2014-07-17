<html>
<head>
	<title>Ruff Love</title>
	<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="/css/bootstrap-amelia.css">
	<link rel="stylesheet" href="/css/rufflove.css">
	<link rel="icon" 
      type="image/png" 
      href="storage_path() . '/paw-print.png'">
	
	<style type="text/css">
	.zero-margin-left {
		margin-left: 0px;
	}
	</style>

	@yield('topscript')

</head>
<body>

	<!-- container -->
	<div class="page-container">
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
		    	</ul>
		    	<ul class="nav navbar-nav navbar-left">
		    		<li><a href="{{ action('HomeController@showAbout')}}">About</a></li>
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
		      	            <li><a href="{{ action('HomeController@doLogout') }}"> Logout </a></li>
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
		   
		  </div>
		</div>
    
            <!-- sidebar -->
            <div class="col-xs-6 col-sm-3 sidebar-offcanvas" id="sidebar" role="navigation">
                <div data-spy="affix" data-offset-top="45" data-offset-bottom="90" class="">
                    <ul class="nav" id="sidebar-nav">
                        <li class='blackfont'><a href="#section1" class="">Nexus 4</a>
                        </li>
                        <li><a href="#section2" class="">Nexus 5</a>
                        </li>
                        <li><a href="#section3" class="">Nexus 7 (2013) WIFI</a>
                        </li>
                        <li><a href="#section4" class="">Nexus 7 (2013) LTE</a>
                        </li>
                        <li><a href="#section5" class="">Nexus 7 (2012) WIFI</a>
                        </li>
                        <li><a href="#section6" class="">PA-Google Apps</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- / .Main content -->

            @yield('content')

            </div>
            <!-- /.col-xs-12 main -->
        </div>
        <!--/.row-->
    </div>
    <!--/.container-->
</div>
<!--/.page-container-->

	
		@if (Session::has('successMessage'))
		    <div class="alert alert-success">{{{ Session::get('successMessage') }}}</div>
		@endif

		@if (Session::has('errorMessage'))
		    <div class="alert alert-danger">{{{ Session::get('errorMessage') }}}</div>
		@endif

	
		<script>
			  $('[data-toggle=offcanvas]').click(function() {
    		  $('.row-offcanvas').toggleClass('active');
 			  });
  
  			$('.btn-toggle').click(function() {
    		$(this).find('.btn').toggleClass('active').toggleClass('btn-default').toggleClass('btn-primary');
  			});

		</script>
	
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

			@yield('bottomscript')

</body>
</html>