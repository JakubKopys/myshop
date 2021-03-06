@section('navbar')
<nav class="navbar navbar-default" id="scroller">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="/">Buy Stuff</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="#">Home</a></li>
            <li><a href="#">Page 2</a></li>
            <li><a href="#">Page 3</a></li>
            <form class="navbar-form navbar-left">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search">
                    <div class="input-group-btn">
                        <button class="btn btn-default" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </div>
                </div>
            </form>
        </ul>
        <ul class="nav navbar-nav navbar-right">
            @if(Auth::guest())
                <li><a href="/login" class="login-link">Login</a></li>
                <li><a href="/register">Register</a></li>
            @else
                @if (Auth::user()->admin)
                    <li>
                        <a href="{{URL::action('Admin\MainController@index')}}">Admin Page</a>
                    </li>
                    <li class={{ Request::is('cart') ? 'active' : '' }}>
                        <a href="{{URL::action('CartController@show')}}">
                            Cart
                            @if (Auth::user()->hasCart())
                                ({{Auth::user()->cart->itemCount()}})
                            @endif
                        </a>
                    </li>
                    <li class="vertical_divider"></li>
                @endif
                <li class={{ Request::is('/') ? 'active' : '' }}>
                    <a href="{{URL::action('HomeController@index')}}">Home</a>
                </li>
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href={{URL::action('UserController@edit', [Auth::user()->id])}}>Settings</a>
                        </li>
                        <li>
                            <a href="{{ url('/logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
</nav>

@include('auth/form')
@endsection