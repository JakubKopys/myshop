<div class="option">
    <a href="{{URL::action('Admin\MainController@index')}}" class={{ Request::is('admin') ? 'active' : '' }}>
        <i class="fa fa-home" aria-hidden="true"></i> Home
    </a>
</div>
<div class="option">
    <a href="{{URL::action('Admin\ProductController@index')}}" class={{ Request::is('*products*') ? 'active' : '' }}>
        <i class="fa fa-shopping-cart" aria-hidden="true"></i> Manage Products
    </a>
</div>
<div class="option">
    <a href="{{URL::action('Admin\UserController@index')}}" class={{ Request::is('*users*') ? 'active' : '' }}>
        <i class="fa fa-users" aria-hidden="true"></i> Manage Users
    </a>
</div>
<div class="option">
    <a href="{{URL::action('Admin\CategoryController@index')}}" class={{ Request::is('*categories*') ? 'active' : '' }}>
        <i class="fa fa-th" aria-hidden="true"></i> Manage Categories
    </a>
</div>
<div class="option">
    <a href="#" class={{ Request::is('*orders*') ? 'active' : '' }}>
        <i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Orders
    </a>
</div>
<div class="option">
    <a href="{{ url('/logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-sign-out" aria-hidden="true"></i> Logout
        <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </a>
</div>
<div class="option down">
    <a href="/">
        <i class="fa fa-chevron-left" aria-hidden="true"></i> Back To The Store
    </a>
</div>