@extends('layouts.panel')

@section('panel-heading')
Users Management
@stop

@section('panel-body')
    @cannot('list-users')
    <div class="alert alert-danger" role="alert">You don't have access to List Users</div>
    @endcannot

    @can('create-user')
    <p>
        <a href="{!! route('users.create') !!}" class="btn btn-primary">
            <span class="glyphicon glyphicon-plus"></span>
            Create User
        </a>
    </p>
    @endcan

    @can('list-users')
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
            <tr>
                <thead>
                    <th>Name</th>
                    <th>Email Address</th>
                    <th>Last Updated At</th>
                    <th>Actions</th>
                </thead>
            </tr>
        </thead>

        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{!! $user->name !!}</td>
                <td>{!! $user->email !!}</td>
                <td>{!! $user->updated_at->diffForHumans() !!}</td>
                <td>
                    @can('update-user')
                    <a href="{!! route('users.edit', $user->id) !!}" class="btn btn-primary btn-xs">
                        Edit
                    </a>
                    @endcan

                    @can('delete-user')
                        @if(auth()->user()->id != $user->id)
                        <form action="{!! route('users.destroy', $user->id) !!}" method="POST" style="display: inline-block;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-danger btn-xs btn-inline">Delete</button>
                        </form>
                        @endif
                    @endcan
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @endcan
@stop
