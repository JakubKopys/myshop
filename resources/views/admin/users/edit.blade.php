@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{URL::action('Admin\UserController@index')}}" class="btn btn-link back">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Back to Users Page
                </a>
                {!! Form::open(['url'=>"admin/users/$user->id", 'method' => 'PATCH']) !!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Edit product</div>
                        </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="name">Full Name</label>
                            <input type="text" name="name" value="{{$user->name}}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input type="email" name="email" value="{{$user->email}}" required class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" placeholder="Password" class="form-control">
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary pull-right" id="add-quote">Update User</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection