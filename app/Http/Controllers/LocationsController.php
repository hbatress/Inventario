<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Locations\LocationsActionInterface;
use App\Contracts\Locations\LocationsQueryInterface;
use Illuminate\Http\JsonResponse;

class LocationsController extends Controller
{
    protected $locationAction;
    protected $locationQuery;

    public function __construct(LocationsActionInterface $locationAction, LocationsQueryInterface $locationQuery)
    {
        $this->locationAction = $locationAction;
        $this->locationQuery = $locationQuery;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/locations",
     *     operationId="StoreLocation",
     *     tags={"Locations"},
     *     summary="Store a new location",
     *     description="Store a new location in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"location_name"},
     *                 @OA\Property(property="location_name", type="string"),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="201",
     *         description="Resource created",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Unprocessable Entity",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function store(Request $request) : JsonResponse {
        list($status, $message, $data) = $this->locationAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/locations/{id}",
     *     operationId="DeleteLocation",
     *     tags={"Locations"},
     *     summary="Delete a location",
     *     description="Delete a location from the system",
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
     *         description="Resource deleted",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No data found",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function destroy($id) : JsonResponse {
        list($status, $message) = $this->locationAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
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
        list($status, $data) = $this->locationQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}