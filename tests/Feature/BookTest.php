<?php

namespace Tests\Feature;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BookTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // Book Page
    public function test_book()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('books.index'))
            ->assertSeeText('Books')
            ->assertSee($book->name)
            ->assertSee($book->author->name)
            ->assertSee($book->category->name)
            ->assertSee($book->price)
            ->assertSeeText('QTY');
    }
    // Book Detail Page
    public function test_book_detail()
    {
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('books.show', $book->id))
            ->assertSeeText('Products')
            ->assertSee($book->name)
            ->assertSee($author->name)
            ->assertSee($category->name)
            ->assertSee($book->number_of_pages)
            ->assertSee($book->price)
            ->assertSeeText('Description')
            ->assertSee($book->description);
    }

    // -----Admin Page-----

    // Book List
    public function test_admin_book_list()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('book.index'))
            ->assertSeeText('Books')
            ->assertSeeText('Name')
            ->assertSeeText('Category')
            ->assertSeeText('Author')
            ->assertSeeText('Action')
            ->assertSeeText('Action')
            ->assertSee($book->name)
            ->assertSee($author->name)
            ->assertSee($category->name)
            ->assertSee($book->number_of_pages)
            ->assertSee($book->price);
    }
    // Add Book
    public function test_admin_add_book()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('book.index', $book->id))
            ->assertSeeText('Add Book')
            ->assertSeeText('Name')
            ->assertSeeText('Description');
    }
    // Book create
    public function test_admin_book_store()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->post(route('book.store'), [
            'name' => $book->name,
            'image' => $book->image,
            'author' => $author->id,
            'category' => $category->id,
            'pages' => $book->number_of_pages,
            'price' => $book->price,
            'description' => $book->description
        ])
            ->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Book())->getTable(),
            [
                'name' => $book->name,
                'image' => $book->image,
                'author_id' => $author->id,
                'category_id' => $category->id,
                'number_of_pages' => $book->number_of_pages,
                'price' => $book->price,
                'description' => $book->description
            ]
        );
    }
    // Edit Book
    public function test_admin_edit_book()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->get(route('book.index', $book->id))
            ->assertSeeText('Edit Book')
            ->assertSeeText('Name')
            ->assertSeeText('Description');
    }
    // Book update
    public function test_admin_book_update()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->post(route('book.update', $book->id), [
            'name' => $book->name,
            'image' => $book->image,
            'author' => $author->id,
            'category' => $category->id,
            'pages' => $book->number_of_pages,
            'price' => $book->price,
            'description' => $book->description
        ])
            ->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Book())->getTable(),
            [
                'name' => $book->name,
                'image' => $book->image,
                'author_id' => $author->id,
                'category_id' => $category->id,
                'number_of_pages' => $book->number_of_pages,
                'price' => $book->price,
                'description' => $book->description
            ]
        );
    }
    // Book Delete
    public function test_admin_book_delete()
    {
        $this->login();
        $author = Author::factory()->create();
        $category = Category::factory()->create();
        $book = Book::factory()->create(['author_id' => $author->id, 'category_id' => $category->id]);
        $this->post(route('book.destroy', $book->id))
            ->assertSessionDoesntHaveErrors();
        // ->assertRedirect();
    }
}
