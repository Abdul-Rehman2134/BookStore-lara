<?php

namespace Tests\Feature;

use App\Models\Category;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // Category List
    public function test_list()
    {
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.index'))
            ->assertSeeText('Categories')
            ->assertSeeText('Name')
            ->assertSeeText('Action')
            ->assertSee($category->name);
    }

    // Category Add
    public function test_create()
    {
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.index'))
            ->assertSeeText('Add Category')
            ->assertSeeText('Name');
    }

    // Category Create
    public function test_store()
    {
        $this->login();
        $category = Category::factory()->create();
        $this->post(
            route('categories.store', $category->id),
            [
                'name' => $category->name
            ]
        )->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Category())->getTable(),
            [
                'name' => $category->name
            ]
        );
    }

    // Category Edit
    public function test_edit()
    {
        $this->login();
        $category = Category::factory()->create();
        $this->get(route('categories.index', $category->id))
            ->assertSeeText('Edit Category')
            ->assertSeeText('Name');
    }

    // Category Update
    public function test_update()
    {
        $this->login();
        $category = Category::factory()->create();
        $this->post(
            route('categories.update', $category->id),
            [
                'name' => $category->name
            ]
        )->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas((new Category())->getTable(),
            [
                'name' => $category->name
            ]
        );
    }

    // Category Delete
    public function test_destroy()
    {
        $category = Category::factory()->create();
        $this->get(route('categories.destroy', $category->id))
            ->assertSessionDoesntHaveErrors();
    }
}
