<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Locations\LocationsQueryInterface;
use Illuminate\Http\JsonResponse;

class LocationsQueryController extends Controller
{
    protected $locationQuery;

    public function __construct(LocationsQueryInterface $locationQuery)
    {
        $this->locationQuery = $locationQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/locations/{id}",
     *     operationId="GetLocation",
     *     tags={"Locations"},
     *     summary="Get a location",
     *     description="Get details of a location from the system",
     *     @OA\Parameter (
     *         description="Id of the location",
     *         in="path",
     *         name="id",
     *         required=true,
     *         example=1,
     *         @OA\Schema (
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Data Found",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No data found",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function show($id) : JsonResponse {
        $result =  $this->locationQuery->getAction($id);
        return $this->responseWithData($result);
    }
        /**
     * @OA\Get(
     *     path="/digital/api/locations/list",
     *     operationId="GetAllocations",
     *     tags={"Locations"},
     *     summary="Get all locations",
     *     description="Get details of all locations from the system",
     *     @OA\Response(
     *         response="200",
     *         description="Data Found",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No data found",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function index() : JsonResponse {
        $result =  $this->locationQuery->getAll();
        return $this->responseWithData($result);
    }
}