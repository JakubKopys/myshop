@extends('layouts.app')

@section('navbar')
    <div class="jumbotron">
        <div class="container text-center">
            <h1>Online Store</h1>
            <p>Buy some stuff here I guess...</p>
        </div>
    </div>
    @parent
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @foreach($products as $product)
                @include('products/product', $product)
            @endforeach
        </div>
    </div>
</div>
@include('layouts/footer')
@endsection

