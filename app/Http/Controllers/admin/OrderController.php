<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $orders = Order::join('users', 'orders.user_id', '=', 'users.id')
            ->select(DB::raw('users.id AS id, users.name as name, COUNT(orders.id) As totalOrders, SUM(orders.total_amount) AS totalAmount'))
            ->groupBy('orders.user_id')
            ->get();
        return view('admin.orders.orders', ['orders' => $orders]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orders = Order::where('user_id',$id)->get();
        return view('admin.orders.user_orders',['orders'=>$orders]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('admin.orders.orderItems',['orderItems'=>$orderItems]);
    }

}
