@extends('layouts.app')
@section('title', 'Books Detail')
@section('content')
<center>
    <div class="title">
        Products
    </div>
</center>
<div class="containers">
    <div class="rows">

        <div class="items">
            <img width="100%" src="{{ asset('assets/image/'.$book->image) }}" alt="IMAGE">
        </div>
        <div class="items">
            <h1>wick</h1>

            <p><b>Author :</b> {{ $book->author->name }}</p>
            <p><b>Category :</b>{{ $book->category->name }}</p>
            <p><b>Price :</b> Rs. {{ $book->price }}</p>

            <h3>Description</h3>
            <p>{{ $book->description }}</p>

            <form action="cart-post.php" method="POST">
              <input type="hidden" name="id" value="1">
              <input type="hidden" name="name" value="2">
              <input type="hidden" name="author" value="3">
              <input class="box" type="number" name="qty" value="1">
              <input type="hidden" name="price" value="3">
              <button class="button">Add To Cart</button>
            </form>
        </div>

    </div>
</div>
@endsection
