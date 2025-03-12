<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AssetTypes\AssetTypesActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\AssetTypes\AssetTypesRequest;   
class AssetTypesActionController extends Controller
{
    protected $assetTypeAction;

    public function __construct(AssetTypesActionInterface $assetTypeAction)
    {
        $this->assetTypeAction = $assetTypeAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/asset-types",
     *     operationId="StoreAssetType",
     *     tags={"AssetTypes"},
     *     summary="Store a new asset type",
     *     description="Store a new asset type in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"TypeName"},
     *                 @OA\Property(property="TypeName", type="string"),
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
    public function store(AssetTypesRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->assetTypeAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/asset-types/{id}",
     *     operationId="DeleteAssetType",
     *     tags={"AssetTypes"},
     *     summary="Delete an asset type",
     *     description="Delete an asset type from the system",
     *     @OA\Parameter (
     *         description="Id of the asset type",
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
        list($status, $message) = $this->assetTypeAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}