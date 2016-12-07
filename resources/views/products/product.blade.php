<div class="col-md-4">
    <div class="thumbnail" >
        <img src="/uploads/product_images/{{ $product->image }}" class="img-responsive" style="width:100%; height: 180px;" alt="Image">
        <div class="caption">
            <div class="row">
                <div class="col-md-8 col-xs-8">
                    <h3>{{$product->name}}</h3>
                </div>
                <div class="col-md-4 col-xs-4 price">
                    <h3>
                        <label class="pull-right">${{$product->price}}</label>
                    </h3>
                </div>
            </div>
            <div class="description">
                <p>{{str_limit($product->description, 170)}}</p>
            </div>
            <div class="row">
                <div class="col-md-6 col-md-offset-7">
                    <a href={{URL::action('CartController@addItem', [$product->id])}} class="btn btn-success btn-product">
                        <span class="fa fa-shopping-cart"></span> Add to Cart
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>