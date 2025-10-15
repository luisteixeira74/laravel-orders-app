<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;

class UserTest extends TestCase
{
    #[Test]
    public function password_is_hashed()
    {
        $user = User::factory()->create(['password' => 'plain123']);
        $this->assertTrue(Hash::check('plain123', $user->password));
    }
}
