<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DestinationController extends Controller
{
    /**
     * Retrieve all destinations.
     *
     * Returns the full list of destinations without pagination.
     *
     * @group Destinations
     *
     * @response 200 [
     *   {
     *      "id": "1"
     *      "picture_webp": "image-moon.webp",
     *      "picture_png": "image-moon.png",
     *      "name": "Moon",
     *      "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *      "distance": 384400,
     *      "ett": 3,
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     *   },
     *   ...
     * ]
     */

    public function list(): Collection
    {
        $destinations = Destination::all();

        return $destinations;
    }

    /**
     * Retrieve a paginated list of destinations
     *
     * @group Destinations
     *
     * @authenticated
     *
     * @queryParam page int Page number for pagination. Example: 1
     * @queryParam per_page int Number of items per page. Example: 10
     *
     * @response 200 {
     *   "current page": 1
     *   "data": [
     *   {
     *        "id": "1"
     *        "picture_webp": "image-moon.webp",
     *        "picture_png": "image-moon.png",
     *        "name": "Moon",
     *        "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *        "distance": 384400,
     *        "ett": 3,
     *        "created_at": "2025-04-24T08:39:31.000000Z",
     *        "updated_at": "2025-04-24T08:39:31.000000Z",
     *        "deleted_at": null,
     *   },
     *   ],
     *   "first_page_url": "",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": "",
     *   "links": [
     *      {
     *          "label": "&laquo; Previous",
     *          "active": false,
     *          "url": null
     *      },
     *      ...
     *   ],
     *   "next_page_url": null,
     *   "path": "",
     *   "per_page": 10,
     *   "prev_page_url": null,
     *   "to": 5,
     *   "total": 5
     * }
     */

    public function index(): LengthAwarePaginator
    {
        $destinations = Destination::paginate();

        return $destinations;
    }

    /**
     * Retrieve details of a specific destination.
     *
     * @group Destinations
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the destination. Example: 1
     *
     * @response 200 {
     *      "id": "1"
     *      "picture_webp": "image-moon.webp",
     *      "picture_png": "image-moon.png",
     *      "name": "Moon",
     *      "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *      "distance": 384400,
     *      "ett": 3,
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     * }
     */

    public function show($id): JsonResponse
    {
        $destination = Destination::findOrFail($id);

        return response()->json($destination);
    }

    /**
     * Create a new destination.
     *
     * Requires valid destination data in the request body.
     * The user must be authenticated via Sanctum.
     *
     * @group Destinations
     *
     * @authenticated
     *
     * @bodyParam picture_webp string nullable The path to a picture of the destination in webp format. Example: image-moon.webp
     * @bodyParam picture_png string nullable The path to a picture of the destination in png format. Example: image-moon.png
     * @bodyParam name string required The name of the destination. Example: Moon
     * @bodyParam description string required A description of the destination. Example: See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.
     * @bodyParam distance integer required The distance from Earth to the destination (in kilometers). Example: 384400
     * @bodyParam ett integer required The estimated travel time (in days). Example: 3
     *
     * @response 201 {
     *   "message": "Destination created successfully",
     *   "destination": {
     *       "name": "Moon",
     *       "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *       "distance": "384400",
     *       "ett": "3",
     *       "updated_at": "2025-04-24T08:39:31.000000Z",
     *       "created_at": "2025-04-24T08:39:31.000000Z",
     *       "id": "5"
     *   }
     * }
     */

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

    /**
     * Update an existing destination.
     *
     * @group Destinations
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the destination. Example: 1
     * @bodyParam picture_webp string nullable The path to a picture of the destination in webp format. Example: image-moon.webp
     * @bodyParam picture_png string nullable The path to a picture of the destination in png format. Example: image-moon.png
     * @bodyParam name string required The name of the destination. Example: Moon
     * @bodyParam description string required A description of the technology. Example: See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.
     * @bodyParam distance integer required The distance from Earth to the destination (in kilometers). Example: 384400
     * @bodyParam ett integer required The estimated travel time (in days). Example: 3
     *
     * @response 201 {
     *      "message": "Destination updated successfully",
     *      "destination": {
     *          "name": "Moon",
     *          "description": "See our planet as you’ve never seen it before. A perfect relaxing trip away to help regain perspective and come back refreshed. While you’re there, take in some history by visiting the Luna 2 and Apollo 11 landing sites.",
     *          "distance": "384400",
     *          "ett": "3",
     *          "updated_at": "2025-04-24T08:39:31.000000Z",
     *          "created_at": "2025-04-24T08:39:31.000000Z",
     *          "id": "5"
     *      }
     * }
     * }
     */

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

    /**
     * Delete a destination.
     *
     * @group Destinations
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the destination. Example: 1
     *
     * @response 200 {
     *     "message": "Destination deleted successfully"
     * }
     */

    public function destroy(int $id): JsonResponse
    {
        $destination = Destination::findOrFail($id);
        $destination->delete();

        return response()->json([
            'message' => 'Destination deleted successfully'
        ]);
    }
}
