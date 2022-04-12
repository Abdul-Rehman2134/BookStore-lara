<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AboutTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get(route('about'))
            ->assertSeeText('About Us')
            ->assertSeeText('WELCOME TO BOOK STORE.')
            ->assertSeeText('WIN BEST ONLINE SHOP AT 2021')
            ->assertSeeText('OUR MESSAGE')
            ->assertSeeText('OUR VISSION')
            ->assertSeeText('OUR GOAL');
    }
}
