<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CriticalityLevels\CriticalityLevelsActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\CriticalityLevels\CriticalityLevelsRequest;
class CriticalityLevelsActionController extends Controller
{
    protected $criticalityLevelAction;

    public function __construct(CriticalityLevelsActionInterface $criticalityLevelAction)
    {
        $this->criticalityLevelAction = $criticalityLevelAction;
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
     *                 required={"CriticalityName"},
     *                 @OA\Property(property="CriticalityName", type="string"),
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
    public function store(CriticalityLevelsRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->criticalityLevelAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
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
}