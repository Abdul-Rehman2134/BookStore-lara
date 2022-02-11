@extends('layouts.app')
@section('title', 'Order')
@section('content')

<!-- Heading -->
<center>
    <div class="title">
        My Orders
    </div>
</center>

<div class="tbl">
    <table class="tblCart_items">
        <tr class="tr">
            <th>#</th>
            <th>Items</th>
            <th>Total Amount</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
        @if(count($orders) === 0)
        <tr class="trdEmpty">
            <td>
                <p>
                    <b>
                        <i>
                            'You have not any orders.please go back and purchase any books. Thanks:)'
                        </i>
                    </b>
                </p>
            </td>
        </tr>
        @else
        @foreach ($orders as $index=>$order )
        <tr class="trd">
            <td style="color: red;"><b>
                    {{ $index + 1 }}
                </b></td>
            <td>
                {{ $order->total_items }}
            </td>
            <td align="center">
                {{ $order->total_amount }}
            </td>
            <td align="right" style="color: #ff3333">
                {{ $order->created_at }}
            </td>
            <td align="right"><a href="{{ route('orders.show',$order->id) }}" class="order_detail">Detail</a></td>
        </tr>
        @endforeach
        @endif

    </table>
</div>
@endsection
