<header class="header">
    <h1 class="logo"><a class="text-dark">Admin Panel<i style="color:#04aa6d;" class="fa fa-opencart"
                aria-hidden="true"></i></a></h1>
    <ul class="main-nav">
        <li><a href="{{ route('book.index') }}"
                style="color:{{ request()->routeIs('book.*') ? '#04aa6d' : '' }}">Books</a></li>
        <li><a href="{{ route('categories.index') }}"
                style="color:{{ request()->routeIs('categories.*') ? '#04aa6d' : '' }}">Categories</a></li>
        <li><a href="{{ route('authors.index') }}"
                style="color:{{ request()->routeIs('authors.*') ? '#04aa6d' : '' }}">Authors</a></li>
        <li><a href="{{ route('order.index') }}"
                style="color:{{ request()->routeIs('order.*') ? '#04aa6d' : '' }}">Orders</a></li>
        <li><a href="{{ route('users.index') }}"
                style="color:{{ request()->routeIs('users.*') ? '#04aa6d' : '' }}">Users</a></li>
                <li><a href="{{  route('logout') }}"><button class="btn_logout"><i class="fas fa-sign-out-alt"></i> Logout</button></a></li>
    </ul>
</header>
