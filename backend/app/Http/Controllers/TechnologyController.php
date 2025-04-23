<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TechnologyController extends Controller
{
    public function list(): Collection
    {
        $technologies = Technology::all();

        return $technologies;
    }

    public function index(): LengthAwarePaginator
    {
        $technologies = Technology::paginate();

        return $technologies;
    }

    public function show($id): JsonResponse
    {
        $technology = Technology::findOrFail($id);

        return response()->json($technology);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'picture_portrait' => 'nullable|string|max:255',
            'picture_landscape' => 'nullable|string|max:255',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $technology = Technology::create($validated);

        return response()->json([
            'message' => 'Technology created successfully',
            'Technology' => $technology
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'picture_portrait' => 'nullable|string|max:255',
            'picture_landscape' => 'nullable|string|max:255',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
        ]);

        $technology = Technology::findOrFail($id);
        $technology->update($validated);

        return response()->json([
            'message' => 'Technology updated successfully',
            'Technology' => $technology
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();

        return response()->json([
            'message' => 'Technology deleted successfully'
        ]);
    }
}
