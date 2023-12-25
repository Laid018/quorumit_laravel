<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserDeleteTest extends TestCase
{
    function test_delete_user() {
       $user = User::find(3);
       $response = $this->delete('/user/' . $user->id);

       $response->assertStatus(302);
    }
}
