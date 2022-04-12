<?php

namespace Tests\Feature;

use App\Models\Author;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthorTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_author_list()
    {
        $this->login();
        $author = Author::factory()->create();
        $this->get(route('authors.index'))
            ->assertSeeText('Authors')
            ->assertSeeText('Name')
            ->assertSeeText('Action')
            ->assertSee($author->name);
    }

    // Author Add
    public function test_author_add()
    {
        $this->login();
        $author = Author::factory()->create();
        $this->get(route('authors.index'))
            ->assertSeeText('Add Author')
            ->assertSeeText('Name');
    }

    // Author Create
    public function test_author_create()
    {
        $this->login();
        $author = Author::factory()->create();
        $this->post(
            route('categories.store', $author->id),
            [
                'name' => $author->name
            ]
        )->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Author())->getTable(),
            [
                'name' => $author->name
            ]
        );
    }

    // Author Edit
    public function test_author_edit()
    {
        $this->login();
        $author = Author::factory()->create();
        $this->get(route('authors.index', $author->id))
            ->assertSeeText('Edit Author')
            ->assertSeeText('Name');
    }

    // Author Update
    public function test_author_update()
    {
        $this->login();
        $author = Author::factory()->create();
        $this->post(
            route('authors.update', $author->id),
            [
                'name' => $author->name
            ]
        )->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Author())->getTable(),
            [
                'name' => $author->name
            ]
        );
    }

    // Author Delete
    public function test_author_destroy()
    {
        $author = Author::factory()->create();
        $this->get(route('authors.destroy', $author->id))
            ->assertSessionDoesntHaveErrors();
    }
}
