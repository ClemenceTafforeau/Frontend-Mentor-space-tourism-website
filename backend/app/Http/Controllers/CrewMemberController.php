<?php

namespace App\Http\Controllers;

use App\Models\CrewMember;
use Illuminate\Database\Eloquent\Collection;

class CrewMemberController extends Controller
{
    public function index(): Collection
    {
        $crewMembers = CrewMember::all();

        return $crewMembers;
    }
}
