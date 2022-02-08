@extends('layouts.app')
@section('title', 'Shopping Cart')
@section('content')
<!-- Title -->
<center>
    <div class="title">
        Shopping Bag
    </div>
</center>
<div class="tbl">
    <table class="tblCart_items">
        <tr class="tr">
            <th>#</th>
            <th style="width:200px;"> Item </th>
            <th> Category </th>
            <th> Author </th>
            <th> Quantity </th>
            <th> Unit price </th>
            <th> Total price </th>
            <th> Action </th>
        </tr>
        @php
        $totalItems = 0;
        $totalPrice = 0;
        @endphp
        @if(!empty(session('cartItems')))
        @foreach(session('cartItems') as $index => $cartItem)
        <tr class="trd">
            <td style="color: red;"><b> {{ $index + 1}} </b></td>
            <td style="width:200px;"> {{ $cartItem['name'] }} </td>
            <td align="center"> {{ $cartItem['category'] }} </td>
            <td align="center"> {{ $cartItem['author'] }} </td>
            <td align="center"> {{ $cartItem['qty'] }} </td>
            <td align="center"> {{ $cartItem['price'] }} </td>
            <td align="right"> {{ $cartItem['qty'] * $cartItem['price'] }} </td>
            <td>
                <form action="{{ route('cart.destroy',$index) }}" method="POST">
                    @method('delete')
                    @csrf
                    <button class="submit1 danger"><i class="fas fa-trash-alt"></i>
                </form>
            </td>
        </tr>
        @endforeach
        @php
        $totalItems = count(session('cartItems'));
        $totalPrice = array_reduce(session('cartItems'),
        function($carry,$item)
        {
        return $carry + $item['qty'] * $item['price'];
        },0)
        @endphp
        @else
        <tr class="trdEmpty">
            <td>
                <p><b><i>Your shopping cart is empty.please go back and purchase any books. Thanks:)</i></b></p>
            </td>
        </tr>
        @endif
        <tr class="trh">
            <th>total Items</th>
            <th>{{ $totalItems }}</th>
            <th>total price</th>
            <th>{{ $totalPrice }}</th>
            <th>
                <form action="order-post.php" method="POST">
                    <input type="hidden" name="total_items" value="50">
                    <input type="hidden" name="total_price" value="100">
                    <button class="submit success" type="submit">Order Now</button>
                </form>
            </th>
        </tr>
    </table>
</div>
@endsection