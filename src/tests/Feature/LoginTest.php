<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function user_can_login_with_valid_credentials()
    {
        $user = User::factory()->create([
            'password' => bcrypt('senha123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'senha123',
        ]);

        $response->assertRedirect('/orders');
        $this->assertAuthenticatedAs($user);
    }

    #[Test]
    public function user_cannot_login_with_invalid_password()
    {
        $user = User::factory()->create([
            'password' => bcrypt('senha123'),
        ]);

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'errada',
        ]);

        $response->assertSessionHasErrors();
        $this->assertGuest();
    }
}
