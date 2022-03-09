@extends('admin.layout.app')
@section('title', 'User Orders')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark text-capitalize"><i class="fa fa-user-circle-o"></i><b> {{ $orders[0]->user->name}}'s Orders </b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Items</th>
                            <th>Total Amount</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index => $order)                            
                        <tr class="trd">
                            <td style="color: red;"><b>{{ $index + 1 }}</b></td>
                            <td>{{ $order->total_items }}</td>
                            <td>{{ $order->total_amount }}</td>
                            <td style="color: #ff3333">{{ $order->created_at }}</td>
                            <td><a href="{{ route('order.edit', $order->id) }}" class="order_detail">Detail</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
