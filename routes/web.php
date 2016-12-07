<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', 'HomeController@index');

Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');
Route::get('/users', 'UserController@index');


Route::get('/products/new', 'ProductController@new');
Route::post('/products', 'ProductController@create');
Route::get('/products/{product}/edit', 'ProductController@edit');
Route::get('/products/{product}', 'ProductController@show');
Route::patch('/products/{product}', 'ProductController@update');
Route::get('/products', 'ProductController@index');
Route::delete('/products/{product}', 'ProductController@destroy');

Route::get('/addProduct/{product}', 'CartController@addItem');
Route::get('/removeItem/{cartItem}', 'CartController@removeItem');
Route::get('/cart', 'CartController@show');

Route::get('/categories/new', 'CategoryController@new');
Route::post('/categories', 'CategoryController@create');
Route::delete('/categories/{category}', 'CategoryController@destroy');
Route::get('/categories/{category}/edit', 'CategoryController@edit');
Route::patch('/categories/{category}', 'CategoryController@update');

Route::get('/paginated_products', function () {
    $products = App\Product::paginate(6);

    // HTML string accumulator
    $view = null;

    foreach ($products as $product) {
        $view .= ((string)View::make('products/product', compact('product'))->render());
    }

    //(string)$products->links() is pagination html for selected page.
    return [$view, (string)$products->links()];
});