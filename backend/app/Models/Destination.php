<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Destination extends Model
{
    use HasFactory;

    protected $fillable = [
        'picture_webp',
        'picture_png',
        'name',
        'description',
        'distance',
        'ett'
    ];
}
