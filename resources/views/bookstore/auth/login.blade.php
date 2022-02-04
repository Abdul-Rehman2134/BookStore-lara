@extends('layouts.app')
@section('title', 'Login')
@section('content')
<div class="main">
    <p class="sign" align="center">Sign in</p>
    <form class="form1" action="{{ route('login_store') }}" method="POST">
        @csrf
        <a class="bt"><button class="btn1" type=""><i class="fas fa-user"></i></button>
            <input class="un" name="email" type="email" placeholder="Username" name="user"> </a>
        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input id="inp" class="un" name="password" type="password" placeholder="password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%;cursor: pointer " class="fas fa-eye-slash" id="icon"
                onclick="showPass()"></i> </a>
        <button class="submit success" type="submit">Sign in</button>
        <p class="forgot"><a href="#">Forgot Password?</p>
    </form>
</div>
<script>
    function showPass(){
    document.getElementById("inp").type = 'text';
    document.getElementById("icon").className = 'fas fa-eye';
    document.getElementById("icon").setAttribute('onclick','hidePass()');
}
function hidePass(){
    document.getElementById("inp").type = 'password';
    document.getElementById("icon").className = 'fas fa-eye-slash';
    document.getElementById("icon").setAttribute('onclick','showPass()');
}
</script>
@endsection