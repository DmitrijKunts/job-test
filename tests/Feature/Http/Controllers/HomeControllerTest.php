<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_guest()
    {
        $this->get('/')
            ->assertStatus(200)
            ->assertSee('/login');
    }

    public function test_admin()
    {
        $user = User::factory()->create(['name' => 'admin', 'password' => bcrypt('admin')]);
        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200)
            ->assertSee('/user')
            ->assertSee('/logout');
    }

    public function test_auth()
    {
        $user = User::factory()->create();
        $this->actingAs($user)
            ->get('/')
            ->assertStatus(200)
            ->assertSee('/logout')
            ->assertDontSee('/users');
    }
}
