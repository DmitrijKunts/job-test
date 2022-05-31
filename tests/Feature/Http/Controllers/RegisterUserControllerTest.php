<?php

namespace Tests\Feature\Http\Controllers;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterUserControllerTest extends TestCase
{
    use WithFaker;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_reg()
    {
        $this->get(route('newusers.create'))
            ->assertStatus(200);

        $this->post(route('newusers.store'), [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numerify('##########')
        ])->assertSessionHasErrors('phone');

        $d = [
            'name' => $this->faker->name(),
            'phone' => $this->faker->numerify('############')
        ];

        $this->post(route('newusers.store'), $d)->assertSessionHasNoErrors()
            ->assertSee('Ваша ссылка');

        $this->post(route('newusers.store'), $d)->assertSessionHasErrors(['name', 'phone']);
    }
}
