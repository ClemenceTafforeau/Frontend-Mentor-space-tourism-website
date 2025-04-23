<?php

namespace App\Models;

use app\Enums\RankEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CrewMember extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'picture_webp',
        'picture_png',
        'rank',
        'first_name',
        'last_name',
        'biography'
    ];
}
