<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Locations\LocationsActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Locations\LocationsRequest;
class LocationsActionController extends Controller
{
    protected $locationAction;

    public function __construct(LocationsActionInterface $locationAction)
    {
        $this->locationAction = $locationAction;
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
     *                 required={"LocationName"},
     *                 @OA\Property(property="LocationName", type="string"),
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
    public function store(LocationsRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->locationAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
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
}