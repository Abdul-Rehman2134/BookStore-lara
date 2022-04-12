<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('index'))
            ->assertSeeText('Top interesting')
            ->assertSeeText('NEW ARRIVAL')
            ->assertSeeText('ONSALE')
            ->assertSeeText('FEATURED PRODUCTS')
            ->assertSee($book->name)
            ->assertSee($author->name)
            ->assertSee($category->name)
            ->assertSee($book->price)
            ->assertSeeText('Author of the Month');
    }
}
