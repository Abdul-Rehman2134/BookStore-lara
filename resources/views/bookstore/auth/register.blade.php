@extends('layouts.app')
@section('title', 'Regester')
@section('content')
<div class="main">
    <p class="sign" align="center">Register</p>
    <form class="form1">
        <a class="bt"><button class="btn1" type=""><i class="fas fa-user"></i></button>
            <input class="un " type="text" placeholder="Full Name">
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-at"></i></button>
            <input class="un " type="email" placeholder="Email">
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un " type="password" placeholder="password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%; " class="fas fa-eye"></i>
        </a>

        <a class="bt"><button class="btn1" type=""><i class="fas fa-key"></i></button>
            <input class="un " type="password" placeholder="Confirm password" name="password"> <br>
            <i style="position: relative; bottom: 52px; left: 20%; " class="fas fa-eye"></i>
        </a>
        <button class="submit success" type="submit">Register</button>
</div>
@endsection
