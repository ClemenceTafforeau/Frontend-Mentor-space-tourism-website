<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DestinationController extends Controller
{
    public function list(): Collection
    {
        $destinations = Destination::all();

        return $destinations;
    }

    public function index(): LengthAwarePaginator
    {
        $destinations = Destination::paginate();

        return $destinations;
    }

    public function show($id): JsonResponse
    {
        $destination = Destination::findOrFail($id);

        return response()->json($destination);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'picture_webp' => 'nullable|string|max:255',
            'picture_png' => 'nullable|string|max:255',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'distance' => 'required|integer',
            'ett' => 'required|integer',
        ]);

        $destination = Destination::create($validated);

        return response()->json([
            'message' => 'Destination created successfully',
            'destination' => $destination
        ], 201);
    }

    public function update(Request $request, int $id): JsonResponse
    {
        $validated = $request->validate([
            'picture_webp' => 'nullable|string|max:255',
            'picture_png' => 'nullable|string|max:255',
            'name' => 'required|string|max:100',
            'description' => 'required|string',
            'distance' => 'required|integer',
            'ett' => 'required|integer',
        ]);

        $destination = Destination::findOrFail($id);
        $destination->update($validated);

        return response()->json([
            'message' => 'Destination updated successfully',
            'destination' => $destination
        ]);
    }

    public function destroy(int $id): JsonResponse
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted successfully'
        ]);
    }
}
