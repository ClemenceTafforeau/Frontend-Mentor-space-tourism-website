<?php

namespace App\Http\Controllers;

use App\Models\Technology;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class TechnologyController extends Controller
{
    /**
     * Retrieve all technologies.
     *
     * Returns the full list of technologies without pagination.
     *
     * @group Technologies
     *
     * @response 200 [
     *   {
     *      "id": "1"
     *      "picture_portrait": "image-launch-vehicle-portrait.jpg",
     *      "picture_landscape": "image-launch-vehicle-landscape.jpg",
     *      "name": "Launch vehicle",
     *      "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     *   },
     *   ...
     * ]
     */

    public function list(): Collection
    {
        $technologies = Technology::all();

        return $technologies;
    }

    /**
     * Retrieve a paginated list of technologies
     *
     * @group Technologies
     *
     * @authenticated
     *
     * @queryParam page int Page number for pagination. Example: 1
     * @queryParam per_page int Number of items per page. Example: 10
     *
     * @response 200 {
     *   "current page": 1
     *   "data": [
     *      {
     *          "id": "1"
     *          "picture_portrait": "image-launch-vehicle-portrait.jpg",
     *          "picture_landscape": "image-launch-vehicle-landscape.jpg",
     *          "name": "Launch vehicle",
     *          "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
     *          "created_at": "2025-04-24T08:39:31.000000Z",
     *          "updated_at": "2025-04-24T08:39:31.000000Z",
     *          "deleted_at": null,
     *      },
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
        $technologies = Technology::paginate();

        return $technologies;
    }

    /**
     * Retrieve details of a specific technology.
     *
     * @group Technologies
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the technology. Example: 1
     *
     * @response 200 {
     *      "id": "1"
     *      "picture_portrait": "image-launch-vehicle-portrait.jpg",
     *      "picture_landscape": "image-launch-vehicle-landscape.jpg",
     *      "name": "Launch vehicle",
     *      "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     * },
     */

    public function show($id): JsonResponse
    {
        $technology = Technology::findOrFail($id);

        return response()->json($technology);
    }

    /**
     * Create a new technology.
     *
     * Requires valid technology data in the request body.
     * The user must be authenticated via Sanctum.
     *
     * @group Technologies
     *
     * @authenticated
     *
     * @bodyParam picture_portrait string nullable The path to a picture of the destination in webp format. Example: image-launch-vehicle-portrait.jpg
     * @bodyParam picture_landscape string nullable The path to a picture of the destination in png format. Example: image-launch-vehicle-landscape.jpg
     * @bodyParam name string required The name of the technology. Example: Launch vehicle
     * @bodyParam description string required A description of the technology. Example: A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!
     *
     * @response 201 {
     *   "message": "Technology created successfully",
     *   "technology": {
     *       "name": "Launch vehicle",
     *       "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
     *       "updated_at": "2025-04-24T08:39:31.000000Z",
     *       "created_at": "2025-04-24T08:39:31.000000Z",
     *       "id": "5"
     *   }
     * }
     */

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

    /**
     * Update an existing technology.
     *
     * @group Technologies
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the technology. Example: 1
     * @bodyParam picture_portrait string nullable The path to a picture of the destination in webp format. Example: image-launch-vehicle-portrait.jpg
     * @bodyParam picture_landscape string nullable The path to a picture of the destination in png format. Example: image-launch-vehicle-landscape.jpg
     * @bodyParam name string required The name of the technology. Example: Launch vehicle
     * @bodyParam description string required A description of the technology. Example: A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!
     *
     * @response 201 {
     *      "message": "Technology updated successfully",
     *      "technology": {
     *          "name": "Launch vehicle",
     *          "description": "A launch vehicle or carrier rocket is a rocket-propelled vehicle used to carry a payload from Earth's surface to space, usually to Earth orbit or beyond. Our WEB-X carrier rocket is the most powerful in operation. Standing 150 metres tall, it's quite an awe-inspiring sight on the launch pad!",
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

    /**
     * Delete a technology.
     *
     * @group Technologies
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the technology. Example: 1
     *
     * @response 200 {
     *     "message": "Technology deleted successfully"
     * }
     */

    public function destroy(int $id): JsonResponse
    {
        $technology = Technology::findOrFail($id);
        $technology->delete();

        return response()->json([
            'message' => 'Technology deleted successfully'
        ]);
    }
}
