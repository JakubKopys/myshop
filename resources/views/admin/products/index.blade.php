@extends('admin.layouts.base')

@section('content')
    <div class="container products-index">
        <div class="row">
            <div class="col-md-6 col-md-offset-1" style="margin-bottom: 10px;">
                <a href="products/new"><button class="btn btn-default">New Product</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <table class="table table-striped">
                        <thead>
                        <th>Name</th>
                        <th>Price</th>
                        <th>File</th>
                        <th class="image">Image</th>
                        <th style="text-align: right;">ID</th>
                        <th style="text-align: center">Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}$</td>
                                <td>{{$product->file ? $product->file->original_filename : "no file"}}</td>
                                <td class="image">
                                    {{$product->image}}
                                    <img class="media-object" src="/uploads/product_images/{{$product->image}}" style="width: 100px; height: 72px;">
                                </td>
                                <td style="text-align: right;">{{$product->id}}</td>
                                <td style="text-align: center">
                                    <a href="{{URL::action('Admin\ProductController@edit', [$product->id])}}" class="btn btn-primary">Edit</a>

                                    {!! Form::open(['url'=>"admin/products/$product->id", 'method'=>'delete', 'style'=>'display: inline; margin-left: 5px;']) !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$products->links()}}
            </div>
        </div>
    </div>
@endsection
