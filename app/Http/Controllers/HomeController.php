<?php

namespace App\Http\Controllers;

use App\Actions\CreateHomePageLink;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(User $user)
    {
        return view('home_page', compact('user'));
    }

    public function regenerateLink(User $user)
    {
        $user->update([
            'home_page_link' => CreateHomePageLink::create(),
            'home_page_link_expire' => now()->addDays(7)
        ]);
        return redirect(route('home_link', $user));
    }

    public function disableLink(User $user)
    {
        $user->update(['home_page_link_expire' => now()]);
        return redirect(route('home'));
    }
}
