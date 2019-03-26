<?php

namespace Tests\Browser;

use Tests\DuskTestCase;
use Laravel\Dusk\Browser;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\User;

class CommentTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function test_user_logs_in_and_create_a_comment()
    {
      $user = User::find(1);

      $this->browse(function (Browser $browser) use ($user) {
          $browser->visit('/login')
                  ->type('email', $user->email)
                  ->type('password', 'secret')
                  ->press('Login')
                  ->type('text','This is a comment')
                  ->press('Comment')
                  ->assertSee('This is a comment');
      });
    }
}
