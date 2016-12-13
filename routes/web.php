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

Route::get('/products/{product}', 'ProductController@show');

Route::get('/users/{user}/edit', 'UserController@edit');
Route::patch('/users/{user}', 'UserController@update');

Route::get('/addProduct/{product}', 'CartController@addItem');
Route::get('/removeItem/{cartItem}', 'CartController@removeItem');
Route::get('/cart', 'CartController@show');

Route::get('/categories/{category}', 'CategoryController@show');
Route::get('/categories', 'CategoryController@index');

Route::resource('products.reviews', 'ReviewController', ['only' => [
    'edit', 'update', 'create', 'store', 'destroy'
]]);
// route for ajax product pagination
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

// only admin routes
Route::group(['namespace' => 'Admin', 'middleware' => 'admin', 'prefix'=>'admin'], function () {
    // Controllers Within The "App\Http\Controllers\Admin" Namespace
    Route::get('/', 'MainController@index')->name('admin-home');

    Route::get('/products/new', 'ProductController@new')->name('admin-new-product');
    Route::post('/products', 'ProductController@create');
    Route::get('/products/{product}/edit', 'ProductController@edit');
    Route::patch('/products/{product}', 'ProductController@update');
    Route::get('/products', 'ProductController@index')->name('admin-products');
    Route::delete('/products/{product}', 'ProductController@destroy');

    Route::get('/users/{user}/edit', 'UserController@edit');
    Route::patch('/users/{user}', 'UserController@update');
    Route::delete('/users/{user}', 'UserController@destroy');
    Route::get('/users', 'UserController@index')->name('admin-users');

    Route::resource('categories', 'CategoryController', ['only' => [
        'edit', 'destroy', 'update', 'create', 'store'
    ]]);
    Route::get('/categories', 'CategoryController@index')->name('admin-categories');

    Route::resource('products.reviews', 'ReviewController', ['only' => [
        'edit', 'update', 'create', 'store', 'destroy'
    ]]);
    Route::get('products.reviews', 'ReviewController@index')->name('admin-reviews');
});