<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Assets\AssetsQueryInterface;
use Illuminate\Http\JsonResponse;

class AssetsQueryController extends Controller
{
    protected $assetQuery;

    public function __construct(AssetsQueryInterface $assetQuery)
    {
        $this->assetQuery = $assetQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/assets/{id}",
     *     operationId="GetAsset",
     *     tags={"Assets"},
     *     summary="Get an asset",
     *     description="Get details of an asset from the system",
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
        $result =  $this->assetQuery->getAction($id);
        return $this->responseWithData($result);
    }


    /**
     * @OA\Get(
     *     path="/digital/api/assets/list",
     *     operationId="ListAssets",
     *     tags={"Assets"},
     *     summary="List all assets",
     *     description="Get a list of all assets from the system",
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
    public function listadosindex()  {

        return $this->assetQuery->getAll();
    }

    /**
     * @OA\Get(
     *     path="/digital/api/assets/{idTipo}/{listtipo}",
     *     operationId="GetAssetlit",
     *     tags={"Assets"},
     *     summary="Get an asset",
     *     description="Get details of an asset from the system",
     *     @OA\Parameter (
     *         description="Id of the asset",
     *         in="path",
     *         name="idTipo",
     *         required=true,
     *         example=1,
     *         @OA\Schema (
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
    * @OA\Parameter (    description="Choose the type of asset filter. The value corresponds to the following options:
     * *         1 => TypeID,
     * *         2 => LocationID,
     * *         3 => DepartmentID,
     * *         4 => StatusID,
     * *         5 => ClassificationID,
     * *         6 => CriticalityID",
     * in="path",
    * name="listtipo",
    * required=true,
    * example=1,
    * @OA\Schema (
    * type="integer",
    * format="int64"
   * )
  *  ),
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
    public function lisTipo($id,$bandera) : JsonResponse {
        return $this->assetQuery->getById($id,$bandera);

    }

}
