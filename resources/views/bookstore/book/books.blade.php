@extends('layouts.app')
@section('title', 'Books')
@section('content')

<div class="search">
    <center>
        <input class="searchbox" type="search" name="" value="" placeholder="Books...... "> <button
            class="searchboxicon"><i class="fas fa-search"></i></button>
    </center>
</div>
<div class="carts">
    <div class="cards">
        <div class="card">
            <a href="book-details.php?id=1"><img height="200px" src="{{ asset('assets/image/img10.png') }}" alt="photo">
                <h5>Hello</h5>
                <p><b>Author :</b> john</p>
                <p><b>Category :</b>history</p>
                <h5 class="num">RS.500</h5>
            </a>
            <label for="name">QTY</label>
            <form action="cart-post.php" method="POST">
                <input type="hidden" name="id" value="1">
                <input type="hidden" name="name" value="2">
                <input type="hidden" name="author" value="3">
                <input class="box" name="qty" type="number" value="1" value="1">
                <input type="hidden" name="price" value="4">
                <button class="button">Add To Cart</button>
            </form>
        </div>

    </div>
</div>
@endsection
