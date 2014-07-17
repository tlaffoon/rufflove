@extends('layouts.master')

@section('content')
<div 
{{ Form::open(array('url' => 'register_action')) }}
 
        <p>Name :</p>
 
        <p>{{ Form::text('name') }}</p>

        <p>Username:</p>
 
        <p>{{ Form::text('name') }}</p>
 
        <p>Email :</p>
 
        <p>{{ Form::text('email') }}</p>
 
        <p>Password :</p>
 
        <p>{{ Form::password('password') }}</p>
 
        <p>Confirm Password :</p>
 
        <p>{{ Form::password('password') }}</p>
 
        <p>{{ Form::submit('Submit') }}</p>
 
    {{ Form::close() }}

@stop