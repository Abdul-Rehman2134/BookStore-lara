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
      <th style="width:200px;">Item</th>
      <th>Category</th>
      <th>Quantity</th>
      <th>Unit price</th>
      <th>Total price</th>
      <th>Action</th>
    </tr>
    <tr class="trdEmpty">
      <td>
      <p><b><i>Your shopping cart is empty.please go back and purchase any books. Thanks:)</i></b></p>
      </td>
    </tr>
    <tr class="trd">
        <td style="color: red;"><b>1</b></td>
	    <td style="width:200px;">John</td>
	    <td align="center">Hello</td>
	    <td align="center">50</td>
	    <td align="center">500</td>
	    <td align="right">5000</td>
	        <td>
	          <form action="removecartItem.php" method="POST">
	            <input type="hidden" name="id" value="1">
	            <button class="submit1 danger" type=""><i class="fas fa-trash-alt"></i>
	          </form>
	        </td>
	    </tr>
	   <tr class="trh">
      <th>total quantity</th>
      <th>1</th>
      <th>total price</th>
      <th>2</th>
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
