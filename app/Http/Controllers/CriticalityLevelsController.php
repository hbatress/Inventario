<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CriticalityLevels\CriticalityLevelsActionInterface;
use App\Contracts\CriticalityLevels\CriticalityLevelsQueryInterface;
use Illuminate\Http\JsonResponse;

class CriticalityLevelsController extends Controller
{
    protected $criticalityLevelAction;
    protected $criticalityLevelQuery;

    public function __construct(CriticalityLevelsActionInterface $criticalityLevelAction, CriticalityLevelsQueryInterface $criticalityLevelQuery)
    {
        $this->criticalityLevelAction = $criticalityLevelAction;
        $this->criticalityLevelQuery = $criticalityLevelQuery;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/criticality-levels",
     *     operationId="StoreCriticalityLevel",
     *     tags={"CriticalityLevels"},
     *     summary="Store a new criticality level",
     *     description="Store a new criticality level in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"criticality_name"},
     *                 @OA\Property(property="criticality_name", type="string"),
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
        list($status, $message, $data) = $this->criticalityLevelAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/criticality-levels/{id}",
     *     operationId="DeleteCriticalityLevel",
     *     tags={"CriticalityLevels"},
     *     summary="Delete a criticality level",
     *     description="Delete a criticality level from the system",
     *     @OA\Parameter (
     *         description="Id of the criticality level",
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
        list($status, $message) = $this->criticalityLevelAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Get(
     *     path="/digital/api/criticality-levels/{id}",
     *     operationId="GetCriticalityLevel",
     *     tags={"CriticalityLevels"},
     *     summary="Get a criticality level",
     *     description="Get details of a criticality level from the system",
     *     @OA\Parameter (
     *         description="Id of the criticality level",
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
        list($status, $data) = $this->criticalityLevelQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}