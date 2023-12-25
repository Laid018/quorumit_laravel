<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AddRoleUserTest extends TestCase
{
    public function test_add_role_user(): void
    {
        $user = User::find(3);
        $response = $this->put('/user/' . $user->id, [
            "name" => "secretary",
            "email" => "secretary@gmail.com",
            "role" => "secretary"
        ]);

        $response->assertStatus(302);
    }
}
