<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Statuses\StatusesActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Statuses\StatusesRequest;
class StatusesActionController extends Controller
{
    protected $statusAction;

    public function __construct(StatusesActionInterface $statusAction)
    {
        $this->statusAction = $statusAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/statuses",
     *     operationId="StoreStatus",
     *     tags={"Statuses"},
     *     summary="Store a new status",
     *     description="Store a new status in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"StatusName"},
     *                 @OA\Property(property="StatusName", type="string"),
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
    public function store(StatusesRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->statusAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/statuses/{id}",
     *     operationId="DeleteStatus",
     *     tags={"Statuses"},
     *     summary="Delete a status",
     *     description="Delete a status from the system",
     *     @OA\Parameter (
     *         description="Id of the status",
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
        list($status, $message) = $this->statusAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}