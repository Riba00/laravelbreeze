<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class AutenticationTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest_user_cannot_access_private_url()
    {
        $response = $this->get('/privada1');
        $response->assertRedirect(route('login'));
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_regular_user_cannot_access_private_url()
    {
        $user = User::factory()->create();
        Auth::login($user);

        $response = $this->get('/privada1');
        $response->assertStatus(200);
    }

}
