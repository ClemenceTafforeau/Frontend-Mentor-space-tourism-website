<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Technology extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'picture_portrait',
        'picture_landscape',
        'name',
        'description',
    ];
}
