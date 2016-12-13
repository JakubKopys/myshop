@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <img src="/uploads/product_images/{{ $product->image }}" class="img-responsive img-rounded" style="width:100%; height: 400px;" alt="Image">
                        <div class="row">
                            <div class="col-md-4">
                                <h3>{{$product->name}}</h3>
                            </div>
                            <div class="col-md-6">
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection