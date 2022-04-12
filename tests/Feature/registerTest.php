<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class registerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testRegister()
    {
        $this->get(route('register'))
            ->assertOk()
            ->assertSeeText('Register')
            ->assertSeeText('Password');
    }

    // public function testRegisterStore()
    // {
    //     $this->post(
    //         route('register_store'),
    //         [
    //             'name' => 'Robert',
    //             'email' => 'rob@gmail.com',
    //             'password' => 'admin123',
    //             'confirmPassword' => 'admin123',
    //             'type' => 'CUSTOMER'
    //         ]
    //     )->assertSessionDoesntHaveErrors();
    //     $this->assertDatabaseHas((new User())->getTable(),
    //         [
    //             'name' => 'Robert',
    //             'email' => 'rob@gmail.com',
    //             'type' => 'CUSTOMER'
    //         ]
    //     );
    // }
}
