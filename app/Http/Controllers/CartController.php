<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('bookstore.cart.cart');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $existingItems = session()->get('cartItems',[]);
        $existingItems[] = $request->all();
        session()->put('cartItems',$existingItems);
        return redirect(route('cart.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cartItems = session()->pull('cartItems',[]);
        array_splice($cartItems, $id, 1);
        session()->put('cartItems',$cartItems);
        return redirect(route('cart.index'));
    }
}
