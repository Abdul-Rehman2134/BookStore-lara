@extends('admin.layout.app')
@section('title', 'User Orders')
@section('content')
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2 class="text-dark text-capitalize"><i class="fa fa-user-circle-o"></i><b>Orders Items</b></h2>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Item</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orderItems as $index => $item)
                            <tr class="trd">
                                <td style="color: red;"><b>{{ $index + 1 }}</b></td>
                                <td><img style="height: 60px;position: relative; right:20px;"
                                        src="{{ asset('assets/image/' . $item->book->image) }}" alt="image">
                                </td>
                                <td style="position: relative; right:15px;">{{ $item->book->name }}</td>
                                <td align="left">{{ $item->book->category->name }}</td>
                                <td align="center">{{ $item->quantity }}</td>
                                <td align="center">{{ $item->unit_price }}</td>
                                <td align="right"><a href="{{ route('books.show', $item->book->id) }}"
                                        class="order_detail"> View</a></td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

{{-- <th>#</th>
            <th>Image</th>
            <th>Item</th>
            <th>Category</th>
            <th>Quantity</th>
            <th>Unit Price</th>
            <th>Action</th>
        </tr>
        @foreach ($orderItems as $index => $item)
        <tr class="trd">
            <td style="color: red;">{{ $index + 1 }}</td>
            <td><img style="height: 60px;position: relative; right:20px;"
                    src="{{ asset('assets/image/'.$item->book->image) }}" alt="image">
            </td>
            <td style="position: relative; right:15px;">{{ $item->book->name }}</td>
            <td align="left">{{ $item->book->category->name }}</td>
            <td align="center">{{ $item->quantity }}</td>
            <td align="right">{{ $item->unit_price }}</td>
            <td align="right"><a href="{{ route('books.show',$item->book->id) }}" class="order_detail"> View</a></td>
        </tr>
        @endforeach --}}
