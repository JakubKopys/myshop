@extends('admin.layouts.base')

@section('content')
    <div class="container products-index">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default" style="margin-top: 45px;">
                    <table class="table table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>ID</th>
                        <th style="text-align: center">Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->id}}</td>
                                <td style="text-align: center">
                                    <a href="{{URL::action('Admin\UserController@edit', [$user->id])}}" class="btn btn-primary">Edit</a>

                                    {!! Form::open(['url'=>"admin/users/$user->id", 'method'=>'delete', 'style'=>'display: inline; margin-left: 5px;']) !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$users->links()}}
            </div>
        </div>
    </div>
@endsection