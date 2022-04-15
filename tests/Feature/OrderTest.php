<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class OrderTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    //  Order Page
    public function test_order()
    {
        $user = $this->login();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $this->get(route('orders.index'))
            ->assertSeeText('My Orders')
            ->assertSeeText('Total Amount')
            ->assertSeeText('Action')
            ->assertSee($order->total_items)
            ->assertSee($order->total_amount);
    }
    // Order Detail
    public function test_order_detail()
    {
        $user = $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $order = Order::factory()->create(['user_id' => $user->id]);
        $orderItem = OrderItem::factory()->create(['book_id' => $book->id, 'order_id' => $order->id]);
        $this->get(route('orders.show', $order->id))
            ->assertSeeText('Order Items')
            ->assertSeeText('Category')
            ->assertSeeText('Quantity')
            ->assertSee($book->name)
            ->assertSee($category->name)
            ->assertSee($orderItem->quantity)
            ->assertSee($orderItem->unit_price);
    }

    // -----Admin Page-----

    // Order List
    public function test_order_list()
    {
        $user = $this->login();
        $order = Order::factory()->create(['user_id' => $user->id]);
        $this->get(route('order.index'))
            ->assertSeeText('Orders')
            ->assertSeeText('Customers Name')
            ->assertSeeText('Total Amount')
            ->assertSee($user->name)
            ->assertSee($order->total_amount);
    }
}
