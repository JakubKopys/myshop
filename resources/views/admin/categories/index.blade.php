@extends('admin.layouts.base')

@section('content')
    <div class="container products-index">
        <div class="row">
            <div class="col-md-6 col-md-offset-1" style="margin-bottom: 10px;">
                <a href="categories/create"><button class="btn btn-default">New Category</button></a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-10 col-md-offset-1">
                <div class="panel panel-default">
                    <table class="table table-striped">
                        <thead>
                        <th>Name</th>
                        <th style="text-align: center">Actions</th>
                        </thead>
                        <tbody>
                        @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>

                                <td style="text-align: center">
                                    <a href="{{URL::action('Admin\CategoryController@edit', [$category->id])}}" class="btn btn-primary">Edit</a>

                                    {!! Form::open(['url'=>"admin/categories/$category->id", 'method'=>'delete', 'style'=>'display: inline; margin-left: 5px;']) !!}
                                        {{Form::submit('Delete', ['class'=>'btn btn-danger'])}}
                                    {!! Form::close() !!}
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                {{$categories->links()}}
            </div>
        </div>
    </div>
@endsection
