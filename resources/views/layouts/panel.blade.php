@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @yield('panel-heading')
                    </div>
                    <div class="panel-body">
                        @yield('panel-body')
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
