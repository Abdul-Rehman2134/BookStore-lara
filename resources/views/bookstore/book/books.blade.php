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
       @foreach ($books as $book)
        <div class="card">
            <a href="{{ route('books.show',$book->id) }}">
                <img height="200px" src="{{ asset('assets/image/'.$book->image) }}" alt="photo">
                <h5>{{ $book->name }}</h5>
                <p><b>Author :</b>{{ $book->author->name }} </p>
                <p><b>Category :</b>{{ $book->category->name }}</p>
                <h5 class="num">RS.{{ $book->price }}</h5>
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
        @endforeach
    </div>
</div>
@endsection
