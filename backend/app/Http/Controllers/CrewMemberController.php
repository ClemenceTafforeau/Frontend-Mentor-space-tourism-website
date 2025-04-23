<?php

namespace App\Http\Controllers;

use App\Models\CrewMember;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CrewMemberController extends Controller
{
    public function list(): Collection
    {
        $crewMembers = CrewMember::all();

        return $crewMembers;
    }

    public function index(): LengthAwarePaginator
    {
        $crewMembers = CrewMember::paginate();

        return $crewMembers;
    }

    public function show($id): JsonResponse
    {
        $crewMember = CrewMember::findOrFail($id);

        return response()->json($crewMember);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'picture_webp' => 'nullable|string|max:255',
            'picture_png' => 'nullable|string|max:255',
            'rank' => 'required|string|max:100',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'biography' => 'required|string',
        ]);

        $crewMember = CrewMember::create($validated);

        return response()->json([
            'message' => 'Crew member created successfully',
            'crew' => $crewMember
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'picture_webp' => 'nullable|string|max:255',
            'picture_png' => 'nullable|string|max:255',
            'rank' => 'required|string|max:100',
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'biography' => 'required|string'
        ]);

        $crewMember = CrewMember::findOrFail($id);
        $crewMember->update($validated);

        return response()->json([
            'message' => 'Crew member updated successfully',
            'crew' => $crewMember
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $crew = CrewMember::findOrFail($id);
        $crew->delete();

        return response()->json([
            'message' => 'Crew member deleted successfully'
        ]);
    }
}
