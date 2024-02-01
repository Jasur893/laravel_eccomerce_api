<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_login_is_possible(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/api/login', [
            'email' => $user->email,
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJson([
                'data' => true,
                'success' => true,
                'status' => true,
            ]);
        $response->assertJsonStructure([
            'data' => [
                'token'
            ]
        ]);
    }

    public function test_possible_to_bring_the_logged_in_user(): void
    {
        $user = User::factory()->create();
        auth()->login($user);

        $response = $this->get('/api/user');
        $response->assertOk()
            ->assertJson([
                'data' => true
            ]);

        $this->assertAuthenticatedAs($user);
    }
}
