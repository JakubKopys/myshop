@extends('layouts.app')

@section('content')

    <div class="container products-index">
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
                        <th>Name</th>
                        <th>Price</th>
                        <th>File</th>
                        <th class="image">Image</th>
                        <th style="text-align: center">Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td>{{$product->file ? $product->file->original_filename : "no file"}}</td>
                                <td class="image">{{$product->image}}</td>

                                <td style="text-align: center">
                                    <a href="{{URL::action('ProductController@edit', [$product->id])}}" class="btn btn-primary">Edit</a>

                                    {!! Form::open(['url'=>"/products/$product->id", 'method'=>'delete', 'style'=>'display: inline; margin-left: 5px;']) !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
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
