<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Actions\ActionsActionInterface;
use Illuminate\Http\JsonResponse;

class ActionsActionController extends Controller
{
    protected $actionAction;

    public function __construct(ActionsActionInterface $actionAction)
    {
        $this->actionAction = $actionAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/actions",
     *     operationId="StoreAction",
     *     tags={"Actions"},
     *     summary="Store a new action",
     *     description="Store a new action in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"action_name"},
     *                 @OA\Property(property="action_name", type="string"),
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
        list($status, $message, $data) = $this->actionAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/actions/{id}",
     *     operationId="DeleteAction",
     *     tags={"Actions"},
     *     summary="Delete an action",
     *     description="Delete an action from the system",
     *     @OA\Parameter (
     *         description="Id of the action",
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
        list($status, $message) = $this->actionAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}