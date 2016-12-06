@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-4">
                {!! Form::open(['url'=>"/users/$user->id", 'method' => 'PATCH']) !!}
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
                        <button type="submit" class="btn btn-primary" id="add-quote">Update Profile</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection