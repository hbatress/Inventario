<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AssetTypes\AssetTypesActionInterface;
use App\Contracts\AssetTypes\AssetTypesQueryInterface;
use Illuminate\Http\JsonResponse;

class AssetTypesController extends Controller
{
    protected $assetTypeAction;
    protected $assetTypeQuery;

    public function __construct(AssetTypesActionInterface $assetTypeAction, AssetTypesQueryInterface $assetTypeQuery)
    {
        $this->assetTypeAction = $assetTypeAction;
        $this->assetTypeQuery = $assetTypeQuery;
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
     *                 required={"type_name"},
     *                 @OA\Property(property="type_name", type="string"),
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
        list($status, $message, $data) = $this->assetTypeAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
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

    /**
     * @OA\Get(
     *     path="/digital/api/asset-types/{id}",
     *     operationId="GetAssetType",
     *     tags={"AssetTypes"},
     *     summary="Get an asset type",
     *     description="Get details of an asset type from the system",
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
        list($status, $data) = $this->assetTypeQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}