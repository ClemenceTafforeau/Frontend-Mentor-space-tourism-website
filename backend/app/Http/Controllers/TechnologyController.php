<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;

class TechnologyController extends Controller
{
    public function index(): Collection
    {
        $technologies = Technology::all();

        return $technologies;
    }
}
