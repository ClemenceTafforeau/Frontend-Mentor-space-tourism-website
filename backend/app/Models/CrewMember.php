<?php

namespace App\Models;

use app\Enums\RankEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CrewMember extends Model
{
    use HasFactory;

    protected $casts = [
        'rank' => RankEnum::class
    ];

    protected $fillable = [
        'picture_webp',
        'picture_png',
        'first_name',
        'last_name',
        'biography'
    ];
}
