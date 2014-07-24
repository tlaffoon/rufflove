@extends('layouts.updated-master')

@section('topscript')
<style>

  
    .form_hover {
        padding: 0px;
        position: relative;
        overflow: hidden;
        height: 230px;
    }

        .form_hover:hover .header {
            opacity: 1;
            transform: translateY(-172px);
            -webkit-transform: translateY(-172px);
            -moz-transform: translateY(-172px);
            -ms-transform: translateY(-172px);
            -o-transform: translateY(-172px);
        }

        .form_hover img {
            z-index: 4;
        }

        .form_hover .header {
            position: absolute;
            top: 170px;
            -webkit-transition: all 0.3s ease;
            -moz-transition: all 0.3s ease;
            -o-transition: all 0.3s ease;
            -ms-transition: all 0.3s ease;
            transition: all 0.3s ease;
            width: 100%;
        }

        .form_hover .blur {
            height: 200px;
            z-index: 5;
            position: absolute;
            width: 100%;
        }

        .form_hover .caption-text {
            z-index: 10;
            color: #fff;
            position: absolute;
            height: 260px;
            text-align: center;
            top: -10px;
            width: 100%;
        }
</style>
@stop
@section('content')
 
 
 <!-- CUSTOM banner -->
  <div class="banner clearfix text-center">
    <h1 class="display-text text-supersized">Ruff Love</h1>
      <h1><span class="glyphicon glyphicon-heart"></h1>
    </span> Dating For Dogs</p></h6>
  </div>
  <!-- /.banner -->
    
  <hr class="vertical-spacer">
  
  <div class="container">
  
   <div class="row equal-height-col">
   
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-refresh feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Refreshing</h2>
     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
     <p class="margin-top-20px"><a class="btn btn-default  btn-custom" href="#" role="button">Some Link &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-mobile feature-icon"><!--icon --></i> <i class="fa fa-tablet feature-icon"><!--icon --></i> <i class="fa fa-desktop feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Responsive</h2>
     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Some Link &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-code feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Clean</h2>
     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Some Link &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-signal feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Different</h2>
     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat.</p>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Some Link &raquo;</a></p>
    </div>
    <!--/.col-* -->
    
   </div>
   <!-- /.row .equal-height-col -->
   
  </div>
  <!-- /.container -->
  
  <hr class="vertical-spacer">
  
  
  <div class="container">
   <div class="row">
    <div class="col-sm-6">
     <img src="/includes/DogImages/bond.jpg" alt="Title of Image" class="img-responsive img-custom">
     <hr class="vertical-spacer visible-xs">
    </div>
    <div class="col-sm-6">
     <h2 class="h1 font-weight-normal no-margin-top display-text">Head in the Game</h2>
     <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat.</p>
     <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa.</p>
    
    <hr>
    
    <blockquote>
    <p class="display-text lead">A dog is the only thing on earth that loves you more than he loves himself</p>
    <footer>Josh Billings</footer>
    </blockquote>
    
    </div>
   </div>
   <!-- /.row -->




<legend>Dog Search Results</legend>
    <div class="row">
        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
                    <img class='imgCenter' src="/includes/DogImages/White-Dog.jpg" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>02/09/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>104</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
                   <img class='imgCenter' src="/includes/DogImages/happydog.jpeg" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>03/07/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>324</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>                                    
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
<!--                     <i class="fa fa-user" style="font-size: 147px;"></i> -->
                    <img class="imgCenter" src="/includes/DogImages/greydog.jpg" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>01/09/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>743</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
                   <img class='imgCenter' src="/includes/DogImages/dresseddog.png" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 260px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>02/09/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>104</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
                    <img class='imgCenter' src="/includes/DogImages/pug.jpeg" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>03/07/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>324</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>                                    
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="form_hover " style="background-color: #000;">
                <p style="text-align: center;">
                    <img class='imgCenter' src="/includes/DogImages/waterdog.gif" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Dog's Details</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>01/09/2013</b>
                                </div>
                                <div class="form-group">
                                    Download Count:<b>743</b>
                                </div>
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
</div>
  <!-- /.container -->


  

@stop