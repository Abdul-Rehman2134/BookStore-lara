<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class AboutE2eTest extends DuskTestCase
{
    use DatabaseMigrations;
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_about()
    {
        $user = $this->createNewUser();
        $this->browse(function (Browser $browser) use ($user) {
            $browser->loginAs($user)->visit('about')
                ->assertSee('About Us')
                ->assertSee('WELCOME TO BOOK STORE.')
                ->assertSee('OUR MESSAGE')
                ->assertSee('OUR VISSION')
                ->assertSee('OUR GOAL');
        });
    }
}
