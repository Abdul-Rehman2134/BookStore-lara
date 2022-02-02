    <!-- header start -->
    <header class="header">
        <h1 class="logo"><a href="#">BookStore <i style="color:#04aa6d;" class="fab fa-opencart"></i></a></h1>
        <ul class="main-nav">
            <li><a href="{{ url('/') }}">Home</a></li>
            <li><a href="{{ route('books.index') }}">Books</a></li>
            <li><a href="{{ route('about') }}">About us</a></li>
            <li><a href="{{ route('contact') }}">Contact us</a></li>
        @guest
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">register</a></li>
        @endguest

        @if(empty(session('user')))
        @auth
        <li><a href="{{  route('logout') }}">Logout</a></li>
        <li><a href="order.php">My-Orders</a></li>
        @endauth
        @endif

            <li><a href="{{ route('cart.index') }}" class="icon">Cart<i class="fa fa-shopping-cart">
                        <span class='badge badge-warning' id='lblCartCount'>
                            {{  !empty(session('cartItems'))?count(session('cartItems')):0; }}
                        </span>
                    </i></a>
            </li>
            {{-- <li class="li_admin"><a href="admin/"><button class="btn_admin">Admin</button></a></li> --}}
        </ul>
    </header>
    <!--header end  -->
