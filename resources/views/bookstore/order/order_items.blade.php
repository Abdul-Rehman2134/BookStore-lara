@extends('layouts.app')
@section('title', 'Order Items')
@section('content')
<!-- Heading -->
<center>
    <div class="title">
        Order Items
    </div>
</center>

<div class="tbl">
    <table class="tblCart_items">
        <tr class="tr">
            <th>#</th>
            <th>Image</th>
            <th>Item</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Action</th>
        </tr>
            @foreach ($orderItems as $index=>$item )
            <tr class="trd">
                <td style="color: red;">{{ $index + 1 }}</td>
                <td><img style="height: 60px;position: relative; right:20px;" src="{{ asset('assets/image/'.$item->book->image) }}" alt="image"></td>
                <td style="position: relative; right:15px;">{{ $item->book->name }}</td>
                <td align="left">{{ $item->book->category->name }}</td>
                <td align="center">{{ $item->quantity }}</td>
                <td align="right">{{ $item->unit_price }}</td>
                <td align="right"><a href="{{ route('books.show',$item->book->id) }}" class="order_detail"> View</a></td>
            </tr>
            @endforeach
        </table>
</div>
@endsection
