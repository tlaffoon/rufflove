<!doctype html>
    <!--[if lt IE 8]> <html class="no-js ie7" lang="en"> <![endif]-->
    <!--[if IE 8 ]> <html class="no-js lt-ie9 ie8" lang="en"> <![endif]-->
    <!--[if IE 9 ]> <html class="no-js lt-ie10 ie9" lang="en"> <![endif]-->
    <!--[if (gte IE 10)|!(IE)]><!-->
    <html class="no-js" lang="en">
    <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Ruff Love-Dating for Dogs</title>

     
    <!-- Bootstrap core CSS use 3.1.1 and up framework :: this is the base css without any color changes -->
    <link href="/includes/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">

    <!-- Way Better Bootstrap Modals INSTRUCTIONS: https://github.com/jschr/bootstrap-modal/ -->
    <!-- DEMO:: http://jschr.github.io/bootstrap-modal/bs3.html -->
    <link href="/includes/assets/css/bootstrap-modal.css" rel="stylesheet" type="text/css">
     
    <!-- Google Font(s) -->
    <link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,300italic,400italic,900,900italic,700,700italic,600,600italic,200,200italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Fredericka+the+Great' rel='stylesheet' type='text/css'>
     
    <!-- Wrapper and Supporting Styles -->
    <link href="/includes/assets/css/different_base.css" rel="stylesheet" type="text/css">
    <!-- ####### Put your color css last class 'base-color' is only used for demo ######### -->
    <link href="/includes/assets/css/colors/black-white.css" class="base-color" rel="stylesheet" type="text/css">

     
     <!-- SCRIPTS IN HEAD ============================================== -->
     
    <script src="/includes/assets/js/modernizr-2.6.2-respond-1.1.0.min.js"></script>
     
    <!-- NOTE:: jquery 2.x does not support IE 8 so version 1.9.1 is used for older versions of IE
        :: calling jQuery in the head for ajax work if necessary.
            -->
    <!--[if gt IE 8]><!-->
    <script src="/includes/assets/js/jquery.min.2.0.3.js"></script>
        <!--<![endif]-->
    <!--[if lt IE 9]>
    <script src="assets/js/1.9.1-jquery.min.js"></script>
    <![endif]-->
     
    <!-- WINDOWS 8 Phones BUG FIX -->
    <script src="/includes/assets/js/windows-fix.js"></script>
     
    <!--[if lt IE 9]>
    <script type="text/javascript" src="assets/js/selectivizr.js"></script>
    <![endif]-->
     
         
        <!-- ========= GENERATE CODE AND TOUCH ICONS http://iconifier.net/ =========== -->

 @yield('topscript')
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
 </style>
</head>


<body>

<!-- accessibility skip to nav skip content -->
<ul class="sr-only" id="top">
 <li><a href="#nav" title="Skip to navigation" accesskey="n">Skip to Navigation</a></li>
 <li><a href="#page" title="Skip to content" accesskey="c">Skip to Content</a></li>
</ul>
<!--  /.sr-only accessibility-->

<div id="site-wrapper">
 
 <!-- ____________ HEADER _______________  -->
 
 <header class="header clearfix"> 
  
  <!-- ____________ BEGIN NAV BAR WRAPPER _______________  -->
  <div class="nav-wrapper">
  
   <div class="mobile-menu-bar clearfix visible-xs">
    <a href="#" class="toggle-menu"><i class="fa fa-bars"></i></a>
    <a href="#" class="toggle-search"><i class="fa fa-search"></i></a>
    <a href="#" class="toggle-login"><i class="fa fa-sign-in"></i></a>
    <a href="#" class="toggle-signup"><i class="fa fa-pencil"></i></a>
    <!-- add your phone number --> 
    <a href="tel:000-000-0000"><i class="fa fa-phone fw"></i></a>
   </div>
   
   <!-- ____________ SEARCH PANEL _______________  -->
   
   <div class="search-panel">
    <form role="form">
     <input type="search" placeholder="Enter search term and press enter" class="form-control">
    </form>
   </div>
   
   
   <!-- ____________ LOGIN PANEL _______________  --> 
   
   <div class="login-panel">
    <div class="row">
    
     <!-- col-ms-6 non-bootstrap column for 480px - 767px -->
     <div class="col-sm-6 col-lg-4 col-ms-6">
      <h3 class="title">Social Login</h3>
      <ul class="list-unstyled social-user">
       <li><a href="#" title="Login with Facebook" class="facebook"><i class="fa fa-facebook"></i><span>Login with Facebook</span></a></li>
       <li><a href="#" title="Login with Google Plus" class="google"><i class="fa fa-google-plus"></i><span>Login with Google</span></a></li>
       <li><a href="#" title="Login with Twitter" class="twitter"><i class="fa fa-twitter"></i><span>Login with Twitter</span></a></li>
       <li><a href="#" title="Login with Wordpress" class="wordpress"><i class="fa fa-wordpress"></i><span>Login with Wordpress</span></a></li>
      </ul>
      <!-- /.social-user --> 
      <p><a href="your-link-here.html">Forgot your password?</a> <br>
       Don't have an account yet? <a href="#" class="toggle-signup">Sign up</a> </p>
     </div><!-- /col-sm-6 col-lg-4 col-ms-6-->
    
     <!-- col-ms-6 non-bootstrap column for 480px - 767px -->
     <div class="col-sm-6 col-lg-4 col-ms-6">
      <h3 class="title">Sign In</h3>
      {{ Form::open(array('action' => array('HomeController@doLogin'),'role' => 'form')) }}
       <div class="form-group">
        {{ Form::email('email', Input::old('email'), array('class' => 'form-control', 'placeholder' => 'Email')) }}
       </div>
       <div class="form-group">
        {{ Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password')) }}
       </div>
       <div class="form-group checkbox small">
        <label>
         <input type="checkbox">
         Remember Me </label>
       </div>
       <p class="text-center">
       <button class="btn btn-default btn-custom" type="submit"><i class="fa fa-lock"></i> Sign in</button>
       </p>
      {{ Form::close() }}
     </div><!-- /col-sm-6 col-lg-4 col-ms-6-->
     
    </div>
    <!-- /.row-->
    
   </div>
   <!-- /.login-panel--> 
   
   
   
   
   
   
   <!-- ____________ PRIMARY MENU _______________  -->
   
   <!-- 7 main links max with short titles as per most sites in English  if you add more or longer titles the CSS will need to be adjusted per media query -->
   
   <nav class="nav-bar" id="nav" role="navigation">
   
    <ul class="primary-nav">
     <li class="active"><a href="{{ action('HomeController@showHome')}}">Home</a></li> <!-- add class .active on li item when the page is current -->
     <li><a href="{{ action('HomeController@showAbout')}}">About</a></li>
     <li class><a href="{{ action('HomeController@showSearch')}}">Finding a Breeding Partner</a> 
     </li>
     
      @if (Auth::check())
     <li class="has-children"><a href="#">My Account</a>
      <ul>
        <li class="dropdown-header">{{ Auth::user()->username }}</li>
       <li><a href="{{ action('UsersController@edit', Auth::user()->id) }}">My Profile</a></li>
       @if (Auth::user()->role == 'admin')
       <li><a href="{{ action('UsersController@index') }}"> Admin Link </a></li>
       <li class="divider"></li>
       @endif
       @if (Auth::user()->role == 'user')
       <li><a href=""> User Link </a></li>
       <li><a href="{{ action('DogsController@index') }}"> My Dogs </a></li>
        <li class="divider"></li>
        @endif 
        <li><a href="{{ action('HomeController@doLogout') }}">Logout</a></li>
      @endif                       
      </ul>
      <li class="tb-left"><a href="#" class="toggle-login"><i class="fa fa-sign-in"></i>&nbsp;&nbsp;Login</a> </li>
     <li class="tb-left"> <a href="{{ action('HomeController@showRegistration') }}" ><i class="fa fa-pencil"></i>&nbsp;&nbsp;Sign Up</a> </li>
     </li>
      @if (Auth::check())
        <li id='loginName'>{{{ Auth::user()->username }}}</li>
     @endif
    </ul>
    
   </nav>
  </div>
  <!-- /nav-wrapper --> 
  
  <!-- ____________ LOGO _______________  -->
  <div class="logo-wrapper clearfix">
   <a href="#" class="clearfix">
   <img id="logo" src="/includes/DogImages/sofa dog.jpg" alt="company name">
   </a>
   <span><!--logo embelishment --></span>
  </div>
  <!-- /logo-wrapper clearfix --> 
  
  <!-- ____________ SUB BAR  _______________  -->
  <ul class="sub-bar clearfix">
   
  <!-- tagline hides at 767px --> 
   <li class="tagline sb-left hidden-xs">Where Every Day Is Hump Day...</li>
         
   <li class="visible-xs sb-left"><a href="#"><i class="fa fa-envelope-o fw"></i> Contact</a></li>
   
   <li class="visible-xs sb-left"><a href="#" class="toggle-social"><i class="fa fa-comments fw"></i> Follow</a></li>

   <li class="sb-right sb-social-wrapper">
   <ul class="social">
    <li><a href="#" class="fa fa-facebook tooltip-hover" data-placement="bottom" title="Follow Us on Facebook"></a></li>
    <li><a href="#" class="fa fa-google-plus tooltip-hover" data-placement="bottom" title="Follow Us on Google Plus"></a></li>
    <li><a href="#" class="fa fa-twitter tooltip-hover" data-placement="bottom" title="Follow Us on Twitter"></a></li>
    <li><a href="#" class="fa fa-github tooltip-hover" data-placement="bottom" title="Visit our GitHub Page"></a></li>
    <li><a href="#" class="fa fa-linkedin tooltip-hover" data-placement="bottom" title="Follow Us on LinkedIn"></a></li>
    <li><a href="#" class="fa fa-instagram tooltip-hover" data-placement="bottom" title="Follow Us on Instagram"></a></li>
    <li class="last"><a href="#" class="fa fa-rss tooltip-hover" data-placement="bottom" title="Subscribe to Our RSS Feed"></a></li>
    <!--add class last to last visible item -->
    <li class="closeMe"><a href="#" class="fa fa-times visible-xs"></a></li>
    <!--this is visible when screen is small this when small-->
   </ul>
   <!-- .social inside sub-bar -->
   </li>
   
  </ul>
  <!-- /sub-bar --> 
  
 </header>
 <!-- /header --> 
 
 
 
 <!-- ____________ BEGIN MAIN PAGE CONENT  _______________  -->

 
 <div class="page-content clearfix" id="page">

   @yield('content')
  
 </div>
 <!-- / ________ END .page-content _____________ -->
 
</div>
<!-- /#site-wrapper --> 

<!-- ______________ BEGIN FOOTER ______________ -->

<!-- footer uses a jquery script on the columns to make them responsive equal heights -->
<!-- THIS USES CUSTOM COLUMNS -->

<footer class="footer clearfix" id="footer">
 <div class="clearfix">
  <!-- do not use a row around this -->
  
  <div class="footer-col-1 text-right-min-width-768px">
   <section><!-- sections around each area allow for better stacking-->
    <h5>Contact Us</h5>
    <address>
    Responsive Heads Up<br>
    1255 Nowhere Street<br>
    Tampa, FL 33655<br>
    <strong>phone:</strong> <a class="text-underline" href="tel:8135551234">813.555.1234</a><br>
    <strong>fax:</strong> 813.555.1235<br>
    <span class="overflow"><strong>email:</strong> <a class="text-underline" href="mailto:email@domain.com">email@companydomain.com</a></span>
    </address>
   </section>
   
   <hr>
   
   <section>
    <h5>Follow Us</h5>
    <ul class="social list-unstyled clearfix">
     <li><a href="#" class="fa fa-facebook"></a></li>
     <li><a href="#" class="fa fa-google-plus"></a></li>
     <li><a href="#" class="fa fa-twitter"></a></li>
     <li><a href="#" class="fa fa-github"></a></li>
     <li><a href="#" class="fa fa-linkedin"></a></li>
     <li><a href="#" class="fa fa-instagram"></a></li>
     <li class="last"><a href="#" class="fa fa-rss"></a></li>
    </ul>
   </section>
  </div>
  <!-- / .footer-col-1 --> 
  
  <!-- newsletter signup and recent images-->
  <div class="footer-col-2">
   <hr class="visible-xs margin-top-minus-30px">
   <section>
    <h5>Stay Updated</h5>
    <p>Sign up for our newsletter. We won't share your email address.</p>
    <form action="yourscript.php" method="post" class="margin-bottom-20px">
     <div class="input-group footer-signup">
      <input class="form-control" placeholder="Your@EmailAddress.com" type="email">
      <span class="input-group-btn">
      <button type="submit" class="btn btn-primary">Sign Up</button>
      </span> 
      <!--/.input-group-->
     </div>
    </form>
   </section>
   
   <hr>
   
   <section>
    <h5>Recent Images</h5>
    <div class="img-widget clearfix">
        <!-- <a href="#"><img src="../middle/assets/demo-images/florence-341469_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/frankfurt-285607_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/home-22527_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/milwaukee-art-museum-3984_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/reichstag-366201_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/stairs-8443_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/stairs-63747_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/stairs-113610_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/us-capitol-325341_150.jpg" alt="" /></a>
        <a href="#"><img src="../middle/assets/demo-images/vaulted-cellar-247391_150.jpg" alt="" /></a> -->
    </div>
    <!--/.img-widget-->
   </section>
  </div>
  <!-- .footer-col-2 --> 
  
  <!-- blog posts-->
  <div class="footer-col-3">
   <hr class="visible-xs margin-top-minus-30px">
   <section>
   <h5>Latest Blog Posts</h5>
   <ul class="list-unstyled blog-posts">
    <li><a href="your-link-goes-here.html">We will amplify our power to benchmark</a></li>
    <li><a href="your-link-goes-here.html">We have revolutionized the conceptualization of structuring</a></li>
    <li><a href="your-link-goes-here.html">Everything is relative; relatively speaking.</a></li>
    <li><a href="your-link-goes-here.html">My other body is an immortal robot body.</a></li>
    <li><a href="your-link-goes-here.html">I don't know who they are but they're right behind you</a></li>
    <li><a href="your-link-goes-here.html">For those about to rock, we salute you </a> </li>
   </ul>
   </section>
  </div>
  <!-- close .footer-col-3 -->
 </div>
 <!-- close .clearfix-->
 
 <hr class="no-padding-bottom">
 <div class="container-fluid">
  <p class="small margin-top-bottom-20px text-center text-right-min-width-768px">
</p>
 </div>
</footer>

<!-- ______________ END FOOTER ______________ -->





<!--to top -->
<div id="toTop" title="up">
 <i class="fa fa-arrow-circle-o-up"></i>
</div>

<!-- _________ FOOTER SCRIPTS ________ -->

  <script src="/includes/assets/js/bootstrap.min.js"></script>
  <script src="/includes/assets/js/jquery.different_base.js"></script> 

  
  
<!-- Way Better Bootstrap Modals INSTRUCTIONS: https://github.com/jschr/bootstrap-modal/ -->
<!-- DEMO:: http://jschr.github.io/bootstrap-modal/bs3.html -->
  <script src="/includes/assets/js/bootstrap-modalmanager.js"></script>
  <script src="/includes/assets/js/bootstrap-modal.js"></script>

  <script src="/includes/js/typeahead.bundle.js"></script>
  <script src="/includes/js/bloodhound.js"></script>

@yield('bottomscript')

</body>
</html>
