<?php

namespace Tests\Browser;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

use function PHPSTORM_META\type;

class LoginTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     */
    public function testExample(): void
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/')
                    ->assertSee('Log in')
                    ->assertSee('Product listing')
                    ->clickLink('Log in')
                    ->assertSee('Login')
                    ->type('email', 'user@gmail.com')
                    ->type('password', 'user123')
                    ->click(type('submit'));
        });
    }
}
