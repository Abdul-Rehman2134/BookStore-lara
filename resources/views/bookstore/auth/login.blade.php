@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1">
        <a class="bt"><button class="btn1" type=""><i class="fas fa-user"></i></button>
            <input class="un " type="text" placeholder="Username" name="user"> </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un " type="password" placeholder="password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%; " class="fas fa-eye"></i> </a>

        <button class="submit success" type="submit">Sign in</button>
        <p class="forgot"><a href="#">Forgot Password?</p>
</div>
@endsection
