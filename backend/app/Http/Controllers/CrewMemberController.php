<?php

namespace App\Http\Controllers;

use App\Models\CrewMember;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class CrewMemberController extends Controller
{
    /**
     * Retrieve all crew members.
     *
     * Returns the full list of crew members without pagination.
     *
     * @group Crew Members
     *
     * @response 200 [
     *   {
     *      "id": "1"
     *      "picture_webp": "image-douglas-hurley.webp",
     *      "picture_png": "image-douglas-hurley.png",
     *      "rank": "Commander",
     *      "first_name": "Douglas",
     *      "last_name": "Hurley",
     *      "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     *   },
     *   ...
     * ]
     */

    public function list(): Collection
    {
        $crewMembers = CrewMember::all();

        return $crewMembers;
    }

    /**
     * Retrieve a paginated list of crew members
     *
     * @group Crew Members
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
     *      "id": "1"
     *      "picture_webp": "image-douglas-hurley.webp",
     *      "picture_png": "image-douglas-hurley.png",
     *      "rank": "Commander",
     *      "first_name": "Douglas",
     *      "last_name": "Hurley",
     *      "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     *   },
     *   ],
     *   "first_page_url": "",
     *   "from": 1,
     *   "last_page": 1,
     *   "last_page_url": ,
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
        $crewMembers = CrewMember::paginate();

        return $crewMembers;
    }

    /**
     * Retrieve details of a specific crew member.
     *
     * @group Crew Members
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the crew member. Example: 1
     *
     * @response 200 {
     *      "id": "1"
     *      "picture_webp": "image-douglas-hurley.webp",
     *      "picture_png": "image-douglas-hurley.png",
     *      "rank": "Commander",
     *      "first_name": "Douglas",
     *      "last_name": "Hurley",
     *      "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
     *      "created_at": "2025-04-24T08:39:31.000000Z",
     *      "updated_at": "2025-04-24T08:39:31.000000Z",
     *      "deleted_at": null,
     * }
     */

    public function show($id): JsonResponse
    {
        $crewMember = CrewMember::findOrFail($id);

        return response()->json($crewMember);
    }

    /**
     * Create a new crew member.
     *
     * Requires valid crew member data in the request body.
     * The user must be authenticated via Sanctum.
     *
     * @group Crew Members
     *
     * @authenticated
     *
     * @bodyParam picture_webp string nullable The path to a picture of the crew member in webp format. Example: image-douglas-hurley.webp
     * @bodyParam picture_png string nullable The path to a picture of the crew member in png format. Example: image-douglas-hurley.png
     * @bodyParam rank string required The rank of the crew member. Example: Commander
     * @bodyParam first_name string required The first name of the crew member. Example: Douglas
     * @bodyParam last_name string required The last name of the crew member. Example: Hurley
     * @bodyParam biography string required The biography of the crew member. Example: Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.
     *
     * @response 201 {
     *   "message": "Crew member created successfully",
     *   "crew": {
     *       "rank": "Commander",
     *       "first_name": "Douglas",
     *       "last_name": "Hurley",
     *       "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
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

    /**
     * Update an existing crew member.
     *
     * @group Crew Members
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the crew member. Example: 1
     * @bodyParam picture_webp string nullable The path to a picture of the crew member in webp format. Example: image-douglas-hurley.webp
     * @bodyParam picture_png string nullable The path to a picture of the crew member in png format. Example: image-douglas-hurley.png
     * @bodyParam rank string required The rank of the crew member. Example: Commander
     * @bodyParam first_name string required The first name of the crew member. Example: Douglas
     * @bodyParam last_name string required The last name of the crew member. Example: Hurley
     * @bodyParam biography string required The biography of the crew member. Example: Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.
     *
     * @response 201 {
     *      "message": "Crew member updated successfully",
     *      "crew": {
     *          "rank": "Commander",
     *          "first_name": "Douglas",
     *          "last_name": "Hurley",
     *          "biography": "Douglas Gerald Hurley is an American engineer, former Marine Corps pilot and former NASA astronaut. He launched into space for the third time as commander of Crew Dragon Demo-2.",
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

    /**
     * Delete a crew member.
     *
     * @group Crew Members
     *
     * @authenticated
     *
     * @urlParam id integer required The ID of the crew member. Example: 1
     *
     * @response 200 {
     *     "message": "Crew member deleted successfully"
     * }
     */

    public function destroy(int $id): JsonResponse
    {
        $crew = CrewMember::findOrFail($id);
        $crew->delete();

        return response()->json([
            'message' => 'Crew member deleted successfully'
        ]);
    }
}
