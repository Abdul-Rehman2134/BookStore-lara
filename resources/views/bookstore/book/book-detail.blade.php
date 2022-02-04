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
            <h1>{{ $book->name }}</h1>

            <p><b>Author :</b> {{ $book->author->name }}</p>
            <p><b>Category :</b>{{ $book->category->name }}</p>
            <p><b>Price :</b> Rs. {{ $book->price }}</p>

            <h3>Description</h3>
            <p>{{ $book->description }}</p>

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

    </div>
</div>
@endsection