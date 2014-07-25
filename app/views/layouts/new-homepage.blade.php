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
    <a class="btn btn-info" href="{{ action('HomeController@showSearch')}}">Search Now</a>
  </div>
  <!-- /.banner -->
    
  <hr class="vertical-spacer">
  
  <div class="container">
  
   <div class="row equal-height-col">
   
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-heart-o feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Why to Breed Your Dog</h2>
     <p>Breeding your dog can start off with a simple thought. Why go through with it? Here are a list of reasons to take the step for you and your dog. </p><br>
     <p class="margin-top-20px"><a class="btn btn-default  btn-custom" href="#" role="button">Read &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-search feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">What to Look for When Breeding</h2>
     <p>Will your pup's pup prance around in show, or possibly work hard at serving the community? Consider all these factors when breeding.</p><br>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Read &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-paw feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Great Hearding Dog Breeds</h2><br>
     <p>Before purchasing a prancy-poodle to heard, take a look at the list we have gathered of willful-working dogs.</p><br>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Read &raquo;</a></p>
     <hr class="visible-xs visible-sm vertical-spacer">
    </div>
    <!--/.col-* -->
    
    <div class="col-sm-6 col-md-3 text-center">
     <i class="fa fa-smile-o feature-icon"><!--icon --></i>
     <h2 class="spaced-out-header h3 uppercase font-weight-bold">Easy to Train Dog Breeds</h2><br>
     <p>Sit.<br>Stay.<br>Read about easy to train dogs here.</p><br>
     <p class="margin-top-20px"><a class="btn btn-default btn-custom" href="#" role="button">Read &raquo;</a></p>
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
     <h2 class="h1 font-weight-normal no-margin-top display-text">A Bond Undescrible</h2>
     <p>Before you get a dog, you can't quite imagine what living with one might be like; afterward, you can't imagine living any other way. Life without Lucille? Unfathomable, to contemplate how quiet and still home would be, how much less laughter there'd be, and how much less tenderness.</p>
     <p>When you speak to people about what it's like to live with a dog, you hear them talk about discovering a degree of solace that's extremely difficult to achieve in relationships with people, a way of experiencing solitude without the loneliness.</p>
    
    <hr>
    
    <blockquote>
    <p class="display-text lead">A dog is the only thing on earth that loves you more than he loves himself</p>
    <footer>Josh Billings</footer>
    </blockquote>
    
    </div>
   </div>
   <!-- /.row -->




<legend>Most Recently Added</legend>
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
                                <h3 style="color: #000;">Bella</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>Maltese</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>5 years</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>Yes</b>
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
                   <img class='imgCenter' src="/includes/DogImages/dogwater.png" class="img-responsive">
                </p>
                <div class="header">
                    <div class="blur"></div>
                    <div class="header-text">
                        <div class="panel panel-success" style="height: 247px;">
                            <div class="panel-heading">
                                <h3 style="color: #000;">Tucker</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>labrador retriever</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>6 years</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>No</b>
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
                                <h3 style="color: #000;">Dexter</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>Labrador Retriever</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>2 years</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>No</b>
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
                                <h3 style="color: #000;">Emma</h3>
                            </div>
                            <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>Shih Tzu</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>4 years old</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>Yes</b>
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
                                <h3 style="color: #000;">Sadie</h3>
                            </div>
                             <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>Pug</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>3 years old</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>Yes</b>
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
                                <h3 style="color: #000;">Romeo</h3>
                            </div>
                             <div class="panel-body">
                                <div class="form-group">
                                    Breed: <b>Golden Retriever</b>
                                </div>
                                <div class="form-group">
                                    Age: <b>5 years</b>
                                </div>
                                 <div class="form-group">
                                    Purebred: <b>Yes</b>
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