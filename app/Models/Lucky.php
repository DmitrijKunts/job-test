<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lucky extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'points',
        'win_lose',
        'win_summ',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
