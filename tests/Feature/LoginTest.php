<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $this->get(route('login'))
            ->assertSeeText('Sign in')
            ->assertSeeText('Forgot Password?');
    }
    public function testLoginConfirm()
    {
        $user = User::factory()->create(['type' => 'ADMIN']);
        $this->post(
            route('login_store'),
            [
                'email' => "$user->email",
                'password' => 'Pa$$w0rd!',
            ]
        )->assertSessionDoesntHaveErrors();
    }
}
