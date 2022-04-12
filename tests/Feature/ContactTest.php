<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ContactTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $this->get(route('contact'))
            ->assertSeeText('Contact Us')
            ->assertSeeText('Please fill out the form on this section to contact with me.')
            ->assertSeeText('Or call between 9:00 a.m. and 8:00 p.m. ET, Monday through Friday');
    }
}
