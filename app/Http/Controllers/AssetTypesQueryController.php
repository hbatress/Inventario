<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\AssetTypes\AssetTypesQueryInterface;
use Illuminate\Http\JsonResponse;

class AssetTypesQueryController extends Controller
{
    protected $assetTypeQuery;

    public function __construct(AssetTypesQueryInterface $assetTypeQuery)
    {
        $this->assetTypeQuery = $assetTypeQuery;
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
    $result =  $this->assetTypeQuery->getAction($id);
    return $this->responseWithData($result);
    }

        /**
     * @OA\Get(
     *     path="/digital/api/asset-types/list",
     *     operationId="GetAllasset",
     *     tags={"AssetTypes"},
     *     summary="Get all actions",
     *     description="Get details of all actions from the system",
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
    public function index()
    {
        $result = $this->assetTypeQuery->getAll();
        return $this->responseWithData($result);
    }
}