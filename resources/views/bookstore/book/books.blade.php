@extends('layouts.app')
@section('title', 'Books')
@section('links')
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
@endsection
@section('content')

<div class="carts">
    <center>
        <div class="title">
            Books
        </div>
    </center>
    <div class="cards">
        @foreach ($books as $book)
        <div class="card">
            <a href="{{ route('books.show',$book->id) }}" style="text-decoration:none;font-size:13px">
                <img height="200px" src="{{ asset('assets/image/'.$book->image) }}" alt="photo">
                <div style="width: 200px;height: 50px;overflow: hidden;">
                    <h5>{{ $book->name }}</h5>
                </div>
                <br>
                <p><b>Author :</b>{{ $book->author->name }} </p>
                <p><b>Category :</b>{{ $book->category->name }}</p>
                <h5 class="num">RS.{{ $book->price }}</h5>
            </a>
            <label for="name">QTY</label>
            <form action="{{ route('cart.store') }}" method="POST">
                @method('post')
                @csrf
                <input class="box" name="qty" type="number" value="1">
                <input type="hidden" name="id" value="{{ $book->id }}">
                <input type="hidden" name="name" value="{{ $book->name }}">
                <input type="hidden" name="category" value="{{ $book->category->name }}">
                <input type="hidden" name="author" value="{{ $book->author->name }}">
                <input type="hidden" name="price" value="{{ $book->price }}">
                <button class="button">Add To Cart</button>
            </form>
        </div>
        @endforeach
    </div>
    <br>
    <div class="d-flex justify-content-center">
        {{ $books->links("pagination::bootstrap-4") }}
    </div>
    <br>
</div>
@endsection