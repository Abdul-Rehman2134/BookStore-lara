@extends('admin.layout.app')
@section('title', 'Orders')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark"><i class="fa fa-list"></i><b> Orders</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Customers Name</th>
                            <th>Total Orders</th>
                            <th>Total Amount</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $index=>$order)
                        <tr>
                            <td class="text-danger"><b>{{ $index + 1 }}</b></td>
                            <td class="text-capitalize">{{ $order->name }}</td>
                            <td class="mr-5">{{ $order->totalOrders }}</td>
                            <td>{{ $order->totalAmount }}</td>
                            <td><a href="{{ route('order.show', $order->id) }}">View</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
