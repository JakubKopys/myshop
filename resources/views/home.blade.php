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
            <div class="products">
                @foreach($products as $product)
                    @include('products/product', $product)
                @endforeach
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6 col-md-offset-3 pag">
            {{ $products->links() }}
        </div>
    </div>
</div>
@include('layouts/footer')
@endsection

