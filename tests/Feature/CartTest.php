<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CartTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get(route('cart.index'))
            ->assertSeeText('Shopping Bag')
            ->assertSeeText('Category')
            ->assertSeeText('Action')
            ->assertSeeText('total price');
    }
    public function test_add_to_cart()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->post(route('cart.store'), [
            'id' => $book->id,
            'name' => $book->name,
            'category' => $category->name,
            'author' => $author->name,
            'price' => $book->price,
            'qty' => 5
        ])
            ->assertSessionDoesntHaveErrors();
    }
}
