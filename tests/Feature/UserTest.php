<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_list()
    {
        $this->login();
        $user = User::factory()->create();
        $this->get(route('users.index'))
            ->assertSeeText('Users')
            ->assertSeeText('Name')
            ->assertSeeText('Email')
            ->assertSeeText('Type')
            ->assertSee($user->name)
            ->assertSee($user->email)
            ->assertSee($user->type);
    }
}
