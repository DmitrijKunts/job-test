<?php

namespace App\Http\Controllers;

use App\Actions\RegisterUser;
use App\Http\Requests\RegisterUserRequest;
use App\Models\User;

class RegisterUserController extends Controller
{

    public function create()
    {
        return view('register_user');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreUserRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterUserRequest $request, RegisterUser $regUser)
    {
        $validated = $request->validated();
        $user = $regUser->register($validated);
        return view('show_link', compact('user'));
    }
}
