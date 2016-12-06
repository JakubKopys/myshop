@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-2" style="margin-bottom: 10px;">
                <a href="products/new"><button class="btn btn-success">New Product</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-2">
                <div class="panel panel-default">
                    <table class="table table-striped">
                        <thead>
                        <td>Name</td>
                        <td>Price</td>
                        <td>File</td>
                        <td>Image</td>
                        <td>Actions</td>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td>{{$product->file ? $product->file->original_filename : "no file"}}</td>
                                <td>{{$product->image}}</td>
                                <td>
                                    {!! Form::open(['url'=>"/products/$product->id", 'method'=>'delete', 'style'=>'display: inline; margin-left: 5px;']) !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}

                                    <a href="{{URL::action('ProductController@edit', [$product->id])}}" class="btn btn-primary pull-left">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
