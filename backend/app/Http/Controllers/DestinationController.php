<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Collection;

class DestinationController extends Controller
{
    public function index(): Collection
    {
        $destinations = Destination::all();

        return $destinations;
    }
}
