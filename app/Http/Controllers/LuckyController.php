<?php

namespace App\Http\Controllers;

use App\Actions\CalcWin;
use App\Http\Resources\LuckyCollection;
use App\Http\Resources\LuckyResource;
use App\Models\Lucky;
use App\Models\User;
use Illuminate\Http\Request;

class LuckyController extends Controller
{
    public function gen(User $user)
    {
        $points = rand(1, 1000);
        $all = ['points' => $points] + CalcWin::calc($points);
        $lucky = $user->luckie()->create($all);
        return new LuckyResource($lucky);
    }

    public function history(User $user)
    {
        $luckie = $user->luckie()->orderBy('created_at', 'desc')->limit(3)->get();
        return LuckyResource::collection($luckie);
    }
}
