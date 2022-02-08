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
            <input class="un" id="pass" name="password" type="password" placeholder="password"> <br>
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un" id="c_pass" name="confirmPassword" type="password" placeholder="Confirm password"> <br>
            </a>
        <div style="position: relative;right:200px"><input type="checkbox" onclick="myFunction()"><span>Show
                Password</span></div>
        <select class="submit success" name="type">
            <option value="Customer">Customer</option>
            <option value="Admin">Admin</option>
        </select>
        <button class="submit success" type="submit">Register</button>
    </form>
</div>
<script>
    function myFunction()
    {
        var x = document.getElementById("pass");
        var y = document.getElementById("c_pass");
        if (x.type === "password" && y.type === "password"){
          x.type = "text";
          y.type = "text";
        }
        else{
          x.type = "password";
          y.type = "password";
        }
    }
</script>
@endsection