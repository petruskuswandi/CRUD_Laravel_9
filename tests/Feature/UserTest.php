<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    public function test_user_cannot_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Maryanto',
            'email' => 'maryanto@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role' => 'member'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'maryanto@gmail.com'
        ]);

        $user = User::where('email', 'maryanto@gmail.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(403);
    }
    public function test_admin_can_create_student()
    {
        $response = $this->post('/register', [
            'name' => 'Dimas',
            'email' => 'dimas@gmail.com',
            'password' => '12345678',
            'password_confirmation' => '12345678',
            'role' => 'admin'
        ]);

        $this->assertDatabaseHas('users', [
            'email' => 'dimas@gmail.com'
        ]);

        $this->assertDatabaseMissing('users', [
            'email' => 'ahmad@gmail.com'
        ]);

        $user = User::where('email', 'dimas@gmail.com')->first();

        $this->actingAs($user);

        $response2 = $this->get('/create');
        $response2->assertStatus(200);
    }
}
