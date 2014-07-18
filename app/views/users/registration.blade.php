@extends('layouts.master')

@section('content')


        
<div class="container col-md-6">
    <h1>Registration Form</h1>

<div class="clearfix"></div>

{{ Form::open(array('action'=>'UsersController@store', 'files' => true)) }}

    {{ Form::label('password', 'Password') }}
    {{ Form::password('password', array('class' => 'form-group form-control', 'placeholder' => 'Required')) }}
    {{ $errors->first('password', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    <div class="form-group zero-left-margin">

    {{ Form::hidden('role', null, array('value' => 'user')) }}

    {{ Form::label('username', 'Username') }}
    {{ Form::text('username', null, array('class' => 'form-group form-control', 'placeholder' => 'Username')) }}
    {{ $errors->first('username', '<span class="help-block text-warning">:message</span><br>') }}

    {{ Form::label('email', 'Email') }}
    {{ Form::text('email', null, array('class' => 'form-group form-control', 'placeholder' => 'Email')) }}
    {{ $errors->first('email', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('first_name', 'First Name') }}
    {{ Form::text('first_name', null, array('class' => 'form-group form-control', 'placeholder' => 'First Name')) }}
    {{ $errors->first('first_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('last_name', 'Last Name') }}
    {{ Form::text('last_name', null, array('class' => 'form-group form-control', 'placeholder' => 'Last Name')) }}
    {{ $errors->first('last_name', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('address', 'Address') }}
    {{ Form::text('address', null, array('class' => 'form-group form-control', 'placeholder' => 'Address')) }}
    {{ $errors->first('address', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('city', 'City') }}
    {{ Form::text('city', null, array('class' => 'form-group form-control', 'placeholder' => 'City')) }}
    {{ $errors->first('city', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('state', 'State') }}
    {{ Form::text('state', null, array('class' => 'form-group form-control', 'placeholder' => 'State')) }}
    {{ $errors->first('state', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::label('zip', 'Zip') }}
    {{ Form::text('zip', null, array('class' => 'form-group form-control', 'placeholder' => 'Zip')) }}
    {{ $errors->first('zip', '<span class="help-block"><p class="text-warning">:message</p></span><br>') }}

    {{ Form::submit('Register') }}
    {{ Form::close() }}


</div>
</div> <!-- end main container -->

@stop