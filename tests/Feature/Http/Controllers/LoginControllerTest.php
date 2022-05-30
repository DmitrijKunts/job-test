<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;

class LoginControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest()
    {
        $this->get(route('login'))->assertStatus(200);

        $user = User::factory()->create(['name' => 'admin', 'password' => bcrypt('admin')]);
        $this->post(route('login'), ['name' => 'admin2', 'password' => 'admin11'])
            ->assertStatus(302);

        $this->assertTrue(!Auth::check());

        $this->post(route('login'), ['name' => 'admin', 'password' => 'admin'])
            ->assertStatus(302);

        $this->assertTrue(Auth::id() === $user->id);
    }
}
