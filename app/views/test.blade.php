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
<div class="container">
    <form class="form-horizontal">
  <fieldset>
    <legend>Search</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Breed</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" id="inputEmail" placeholder="Daschund">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Purebred</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Yes
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            No
          </label>
        </div>
      </div>
  </div>

    <div class="form-group">
      <label class="col-lg-2 control-label">Sex of Dog</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked="">
            Female
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">
            Male
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Search Radius</label>
      <div class="col-lg-10">
        <select class="form-control" id="select">
          <option>10 miles</option>
          <option>20 miles</option>
          <option>30 miles</option>
          <option>40 miles</option>
          <option>50 miles</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
        <button class="btn btn-default">Cancel</button>
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </fieldset>
</form>


@stop