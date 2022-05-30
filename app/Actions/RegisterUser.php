<?php

namespace App\Actions;

use App\Models\User;
use Illuminate\Support\Str;

class RegisterUser
{
    public function register($data)
    {
        return User::create(
            $data +
                [
                    'password' => bcrypt(Str::random(10)),
                    'home_page_link' => CreateHomePageLink::create(),
                    'home_page_link_expire' => now()->addDays(7)
                ]
        );
    }
}
