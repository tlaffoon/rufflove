@extends ('layouts.updated-master')

@section('topscript')
@stop

@section('content')

{{{ Auth::user()->zip }}}

<!-- NEW CODE FROM TEST BLADE -->
<div class="container">
  {{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 
    <form class="form-horizontal">
  <fieldset>
    <legend>Search</legend>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Breed</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="search-breed" id="inputEmail" placeholder="ex. Daschund">
      </div>
    </div>
    <div class="form-group">
      <label class="col-lg-2 control-label">Purebred</label>
      <div class="col-lg-10">
        <div class="radio">
          <label>
            <input type="radio" name="purebred" id="optionsRadios1" value="Y">
            Yes
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="purebred" id="optionsRadios2" value="N">
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
            <input type="radio" name="sex" id="optionsRadios1" value="F">
            Female
          </label>
        </div>
        <div class="radio">
          <label>
            <input type="radio" name="sex" id="optionsRadios2" value="M">
            Male
          </label>
        </div>
      </div>
    </div>
    <div class="form-group">
      <label for="select" class="col-lg-2 control-label">Search Radius</label>
      <div class="col-lg-10">
        <select class="form-control" id="select" name="miles">
          <option>10 miles</option>
          <option>20 miles</option>
          <option>30 miles</option>
          <option>40 miles</option>
          <option>50 miles</option>
        </select>
      </div>
    </div>
    <div class="form-group">
      <label for="inputEmail" class="col-lg-2 control-label">Zip</label>
      <div class="col-lg-10">
        <input type="text" class="form-control" name="search-breed" id="inputEmail" placeholder="{{{ Auth::user()->zip }}}">
      </div>
    </div>

    <div class="form-group">
      <div class="col-lg-10 col-lg-offset-2">
       <!--  <button class="btn btn-default">Cancel</button>
        <button type="submit" name="search" class="btn btn-primary">Submit</button> -->
        {{ Form::submit('Search-L', array('class' => 'btn btn-default search-bar-btn')) }}
    {{ Form::close() }} 
      </div>
    </div>
  </fieldset>
</form>


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
                            </div> <!-- class="panel-heading" -->
                            <div class="panel-body">
                                <div class="form-group">
                                    Last login Date:<b>01/09/2013</b>
                                </div> <!-- class="form-group" -->
                                <div class="form-group">
                                    Download Count:<b>743</b>
                                </div> class="form-group"
                                <div class="form-group">
                                    User Rating:<br />
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div> <!-- class="form-group" -->
                            </div> <!-- class="panel-body" -->
                        </div> <!-- class="panel panel-success" -->
                    </div>  <!-- class="header-text" -->
                </div> <!-- class="header" -->
            </div> <!-- class="form_hover" -->
        </div> <!-- class="col-lg-4" -->

    </div>
</div>






<hr>


<!-- ========================================================================== -->
<!-- OLD WORKING CODE -->
  <!-- Begin main search form -->
 <div class="container col-md-12 zero-pad-left zero-pad-right"> 

  {{ Form::open(array('action' => array('DogsController@index'), 'id' => 'ajax-form', 'class'=>'form width88', 'role'=>'search')) }}    
      <h3>Search for dog by name</h3>
      {{ Form::text('search-name', null, array('class' => 'form-group form-control', 'placeholder' => 'Search by individual dog name here...')) }}
    
    <!-- end main search form -->

    <!-- Begin breed search form -->
    {{ Form::open(array('action' => array('DogsController@index'), 'class'=>'form width88', 'role'=>'search', 'method' => 'GET')) }} 

            
      <br>
      <h3>Sex</h3>
      
      Female
      {{ Form::radio('sex', 'F', false) }}
      
      Male
      {{ Form::radio('sex', 'M', false) }}
      <br>
      
      <h3>Purebred</h3>
      
      Yes
      {{ Form::radio('purebred', 'Y', false) }}
      No
      {{ Form::radio('purebred', 'N', false) }}
      <br>

      <h3>Enter search radius</h3>
      {{ Form::text('distance', null, array('class' => 'form-group form-control', 'placeholder' => 'Enter Miles')) }}
    <div id="prefetch">
        <h3>Search for breed</h3>
      {{ Form::text('search-breed', null, array('class' => 'typeahead form-group form-control', 'placeholder' => 'Enter Breed')) }}
    </div>
    {{ Form::submit('Search', array('class' => 'btn btn-default search-bar-btn')) }}
    {{ Form::close() }} 
  </div>  
  <!-- end breed search form -->

@stop

@section('bottomscript')
<script type="text/javascript">
$('#ajax-form').on('submit', function (e) {
    e.preventDefault();
    var formValues = $(this).serialize();
    console.log('formValues: ' + formValues);

    $.ajax({
        url: "/search",
        type: "POST",
        data: formValues,
        dataType: "json",
        success: function (data) {
            console.log(data);
            // $('#ajax-message').html(data.message);
            $(data).each(function() {
                console.log('=========');
                console.log('Id: ' + this.id);
                console.log('Breed: ' + this.breed.name);
                console.log('Dog Name: ' + this.name);
                console.log('Sex: ' + this.sex);
                console.log('Age: ' + this.age);
                console.log('Purebred? ' + this.purebred);
                console.log('Owner: ' + this.user.username);
                console.log('Lat: ' + this.user.lat);
                console.log('Lng: ' + this.user.lng);
                console.log('=========');

            });
        }
    });
}); // end ajax form submit block
</script>

<script type="text/javascript">
  var breeds = new Bloodhound({
    datumTokenizer: Bloodhound.tokenizers.obj.whitespace('name'),
    queryTokenizer: Bloodhound.tokenizers.whitespace,
    limit: 10,
    prefetch: {
      url: '/includes/data/breeds.json',
      filter: function(list) {
        return $.map(list, function(country) { return { name: country }; });
      }
    }
  });
   
  // kicks off the loading/processing of `local` and `prefetch`
  breeds.initialize();
   
  // passing in `null` for the `options` arguments will result in the default
  // options being used
  $('#prefetch .typeahead').typeahead(null, {
    name: 'breeds',
    displayKey: 'name',
    // `ttAdapter` wraps the suggestion engine in an adapter that
    // is compatible with the typeahead jQuery plugin
    source: breeds.ttAdapter()
  });
</script>






@stop