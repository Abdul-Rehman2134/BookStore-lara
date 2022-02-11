<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class OrdersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::user()->id;
        $orders = Order::where('user_id', $userId)->get();
        return view('bookstore.order.orders',['orders'=>$orders]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        $order = new Order();
        $order->total_amount = $request->total_amount;
        $order->total_items = $request->total_items;
        $order->user_id = Auth::user()->id;
        $order->save();

        foreach(session('cartItems') as $item){
            $orderItem = new OrderItem();
            $orderItem->quantity = $item['qty'];
            $orderItem->unit_price = $item['price'];
            $orderItem->book_id = $item['id'];
            $orderItem->order_id = $order->id;
            $orderItem->save();
        }
        DB::commit();
        session()->forget('cartItems');
        return redirect(route('orders.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        $orderItems = OrderItem::where('order_id', $id)->get();
        return view('bookstore.order.order_items',['orderItems'=>$orderItems]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
