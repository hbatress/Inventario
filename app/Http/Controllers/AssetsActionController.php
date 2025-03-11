<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Assets\AssetsActionInterface;
use Illuminate\Http\JsonResponse;

class AssetsActionController extends Controller
{
    protected $assetAction;

    public function __construct(AssetsActionInterface $assetAction)
    {
        $this->assetAction = $assetAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/assets",
     *     operationId="StoreAsset",
     *     tags={"Assets"},
     *     summary="Store a new asset",
     *     description="Store a new asset in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"code", "name", "type_id", "location_id", "department_id", "status_id", "classification_id", "criticality_id", "action_id", "created_by"},
     *                 @OA\Property(property="code", type="string"),
     *                 @OA\Property(property="name", type="string"),
     *                 @OA\Property(property="type_id", type="integer"),
     *                 @OA\Property(property="location_id", type="integer"),
     *                 @OA\Property(property="department_id", type="integer"),
     *                 @OA\Property(property="status_id", type="integer"),
     *                 @OA\Property(property="classification_id", type="integer"),
     *                 @OA\Property(property="criticality_id", type="integer"),
     *                 @OA\Property(property="action_id", type="integer"),
     *                 @OA\Property(property="created_by", type="integer"),
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
        list($status, $message, $data) = $this->assetAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/assets/{id}",
     *     operationId="DeleteAsset",
     *     tags={"Assets"},
     *     summary="Delete an asset",
     *     description="Delete an asset from the system",
     *     @OA\Parameter (
     *         description="Id of the asset",
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
        list($status, $message) = $this->assetAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}