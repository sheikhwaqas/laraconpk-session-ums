@extends('layouts.panel')

@section('panel-heading')
Create a New User
@stop

@section('panel-body')
    @include('partials.create-user-form', ['actionUrl' => route('users.store'), 'buttonLabel' => 'Create User'])
@stop
