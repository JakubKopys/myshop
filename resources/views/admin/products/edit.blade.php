@extends('admin.layouts.base')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <a href="{{URL::action('Admin\ProductController@index')}}" class="btn btn-link back">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                    Back to Products Page
                </a>
                {{Form::open(['url'=>"admin/products/$product->id", 'method'=>"PATCH", 'enctype'=>"multipart/form-data", 'class'=>'form-horizontal'])}}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="panel-title">Edit product</div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="name">Name</label>
                                <div class="col-md-9">
                                    <input id="name" name="name" type="text" class="form-control input-md" value="{{$product->name}}">
                                    @if ($errors->has('name'))
                                        <span class="help-block error">
                                        {{ $errors->first('name') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="textarea">Description</label>
                                <div class="col-md-9">
                                    <textarea class="form-control" id="textarea" name="description">{{$product->description}}</textarea>
                                    @if ($errors->has('description'))
                                        <span class="help-block error">
                                        {{ $errors->first('description') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="price">Price</label>
                                <div class="col-md-9">
                                    <input id="price" name="price" type="text" placeholder="Product price" class="form-control input-md" value={{$product->price}}>
                                    @if ($errors->has('price'))
                                        <span class="help-block error">
                                        {{ $errors->first('price') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-3 control-label" for="category_id">Category</label>
                                <div class="col-md-9">
                                    <select class="form-control" name="category_id">
                                        <option selected value={{$category->id}}>{{$category->name}}</option>
                                        @foreach($categories as $c)
                                            <option value={{$c->id}}>{{$c->name}}</option>
                                        @endforeach
                                    </select>
                                    @if ($errors->has('category_id'))
                                        <span class="help-block error">
                                        {{ $errors->first('category_id') }}
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer new-product-footer">
                            <h5 class="new_product_info">Optional:</h5>
                            <div class="form-group">
                                <label for="image" class="col-md-3 control-label">Image</label>

                                <div class="col-md-9">
                                    <label class="btn btn-primary new_product_image">
                                        <input  type="file" name="image" accept="image/png, image/jpeg, image/gif" style="display: none;">
                                        <div class="btn-txt">Choose image</div>
                                    </label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="file" class="col-md-3 control-label">File</label>

                                <div class="col-md-9">
                                    <label class="btn btn-primary new_product_file">
                                        <input  type="file" name="file" style="display: none;">
                                        <div class="btn-txt-file">Choose file</div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-md-3 control-label" for="submit"></label>
                        <div class="col-md-9">
                            <button id="submit" name="submit" class="btn btn-default pull-right">Update Product</button>
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection