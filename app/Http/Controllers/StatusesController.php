<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Statuses\StatusesActionInterface;
use App\Contracts\Statuses\StatusesQueryInterface;
use Illuminate\Http\JsonResponse;

class StatusesController extends Controller
{
    protected $statusAction;
    protected $statusQuery;

    public function __construct(StatusesActionInterface $statusAction, StatusesQueryInterface $statusQuery)
    {
        $this->statusAction = $statusAction;
        $this->statusQuery = $statusQuery;
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
     *                 required={"status_name"},
     *                 @OA\Property(property="status_name", type="string"),
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
        list($status, $message, $data) = $this->statusAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
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

    /**
     * @OA\Get(
     *     path="/digital/api/statuses/{id}",
     *     operationId="GetStatus",
     *     tags={"Statuses"},
     *     summary="Get a status",
     *     description="Get details of a status from the system",
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
        list($status, $data) = $this->statusQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}