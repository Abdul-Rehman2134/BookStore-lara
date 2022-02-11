<!-- header start -->
<header class="header">
    <h1 class="logo"><a href="#">BookStore <i style="color:#04aa6d;" class="fab fa-opencart"></i></a></h1>
    <ul class="main-nav">
        <li><a href="{{ route('index') }}" style="color:{{ request()->routeIs('index') ? '#04aa6d' : '' }}">Home</a>
        </li>
        <li><a href="{{ route('books.index') }}"
                style="color:{{ request()->routeIs('books.*') ? '#04aa6d' : '' }}">Books</a></li>
        <li><a href="{{ route('about') }}" style="color:{{ request()->routeIs('about') ? '#04aa6d' : '' }}">About us</a>
        </li>
        <li><a href="{{ route('contact') }}" style="color:{{ request()->routeIs('contact') ? '#04aa6d' : '' }}">Contact
                us</a></li>
        @guest
        <li><a href="{{ route('login') }}" style="color:{{ request()->routeIs('login') ? '#04aa6d' : '' }}">Login</a>
        </li>
        <li><a href="{{ route('register') }}"
                style="color:{{ request()->routeIs('register') ? '#04aa6d' : '' }}">register</a></li>
        @endguest

        @if(empty(session('user')))
        @auth
        <li><a href="{{  route('logout') }}">Logout</a></li>
        <li><a href="{{ route('orders.index') }}"
                style="color:{{ request()->routeIs('orders.*') ? '#04aa6d' : '' }}">My-Orders</a></li>
        @endauth
        @endif

        <li><a href="{{ route('cart.index') }}" class="icon"
                style="color:{{ request()->routeIs('cart.index') ? '#04aa6d' : '' }}">Cart<i
                    class="fa fa-shopping-cart">
                    <span class='badge badge-warning' id='lblCartCount'>
                        {{ !empty(session('cartItems'))?count(session('cartItems')):0; }}
                    </span>
                </i></a>
        </li>
        {{-- <li class="li_admin"><a href="admin/"><button class="btn_admin">Admin</button></a></li> --}}
    </ul>
</header>
<!--header end  -->
