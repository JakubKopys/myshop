@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{URL::action('Admin\CategoryController@index')}}" class="btn btn-link back">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Back to Categories Page
                </a>
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Add new Category
                    </div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/categories', 'class' => 'form']) !!}
                        <div class="form-group">
                            {!! Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Category Name']) !!}
                        </div>

                        <div class="form-group">
                            {!! Form::submit('Add Category', ['class'=>'btn btn-primary']) !!}
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection