<head>
    <title>@yield('title')</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/image/icon.png') }}">
    {{-- <link rel="icon" type="image/x-icon" href="./assets/favicon.ico" /> --}}
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    @yield('links')
    <link rel="stylesheet" href="{{ asset('assets/style/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/login.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/register.css ') }}">
    <link rel="stylesheet" href="{{ asset('assets/style/cart.css') }}">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
</head>