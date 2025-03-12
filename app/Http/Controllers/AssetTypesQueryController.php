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
    $result = $this->assetTypeQuery->getAction($id);
        if ($result['status']) {
            // Acceder a los datos como un array
            $action = $result['data'];
            // ... código adicional ...
            return response()->json($action, 200);
        } else {
            // Manejar el caso en que no se encuentra la acción
            return response()->json(['status' => false, 'message' => 'No data found'], 404);
        }
    }
}