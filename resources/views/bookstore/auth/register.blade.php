@extends('layouts.app')
@section('title', 'Regester')
@section('content')
<div class="main">
    <p class="sign" align="center">Register</p>
    <form class="form1" action="{{ route('register_store') }}" method="POST">
        @csrf
        @method('post')
        <a class="bt"><button class="btn1" type=""><i class="fas fa-user"></i></button>
            <input class="un" name="name" type="text" placeholder="Full Name">
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-at"></i></button>
            <input class="un" name="email" type="email" placeholder="Email">
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un" id="inp" name="password" type="password" placeholder="password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%;cursor: pointer" id="icon" onclick="showPass()" class="fas fa-eye-slash"></i>
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un" id="inp1" name="confirmPassword" type="password" placeholder="Confirm password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%;cursor: pointer" id="icon1" onclick="showPass()" class="fas fa-eye-slash"></i>
        </a>
        <button class="submit success" type="submit">Register</button>
    </form>
</div>
<script>
    function showPass(){
        document.getElementById("inp").type = 'text';
        document.getElementById("inp1").type = 'text';
        document.getElementById("icon").className = 'fas fa-eye';
        document.getElementById("icon1").className = 'fas fa-eye';
        document.getElementById("icon").setAttribute('onclick','hidePass()');
        document.getElementById("icon1").setAttribute('onclick','hidePass()');
    }
    function hidePass(){
        document.getElementById("inp").type = 'password';
        document.getElementById("inp1").type = 'password';
        document.getElementById("icon").className = 'fas fa-eye-slash';
        document.getElementById("icon1").className = 'fas fa-eye-slash';
        document.getElementById("icon").setAttribute('onclick','showPass()');
        document.getElementById("icon1").setAttribute('onclick','showPass()');
    }
</script>
@endsection
