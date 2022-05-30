<?php

namespace App\Actions;

use App\Models\User;

use Illuminate\Support\Str;

class CreateHomePageLink
{

    public static function create()
    {
        while (true) {
            $link = Str::random(30);
            if (!User::where('home_page_link', $link)->first()) {
                return $link;
            }
        }
    }
}
