@extends('layouts.splash')

@section('topscript')
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<style type="text/css">

</style>
@stop

@section('content')

<div class="img-rounded" style="height: 400px; width: 450px; position: relative; top: 80px; left: 500px; background-image: url(/includes/img/hearts2.jpg);">

<div class="banner clearfix text-center" style="">
   <h1 class="display-text text-supersized" style="font-size: 65px;">Ruff Love</h1>
     <span class="glyphicon glyphicon-heart" style="font-size: 65px;"></span>

   <p style="font-size: 22px;">Dating For Dogs</p>

   <br>

	 <!-- Begin MailChimp Signup Form -->
	 <center>
	 	<h3>Sign Up for Updates!</h3>
	 <link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">
	 <style type="text/css">
	 	#mc_embed_signup{background-image: url(/includes/img/hearts2.jpg); clear:left; font:14px Helvetica,Arial,sans-serif; }
	 	/* Add your own MailChimp form style overrides in your site stylesheet or in this style block.
	 	   We recommend moving this block and the preceding CSS link to the HEAD of your HTML file. */
	 </style>
	 <div id="mc_embed_signup" class="img-rounded" style="width: 95%;">
<form action="//ruff-love.us8.list-manage.com/subscribe/post?u=931944f7e4688d340ee1dd4d5&amp;id=62b323e522" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>	 	<label for="mce-EMAIL"></label>
	 	<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email.address@domain.com" style="font-color: black;"required>
	     <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
	     <div style="position: absolute; left: -5000px;"><input type="text" name="b_238d10a4d43535c14ac289459_33d4b59d58" tabindex="-1" value=""></div>
	     <div class="clear"><input type="submit" value="Woof!" name="subscribe" id="mc-embedded-subscribe" class="button pull-right btn-image" style="position: relative; bottom: 44px; right: 10px;"></div>
	 </form>
	 </div>
	 <!--End mc_embed_signup-->
	 </center>
 </div>
</div>

@stop

@section('bottomscript')
@stop