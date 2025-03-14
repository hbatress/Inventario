<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Assets\AssetsActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Assets\AssetsRequest;
use App\Http\Requests\Requests\Assets\UpdateAssetsRequest;
use Illuminate\Support\Facades\Log;
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
     * *         required=true,
     * *         @OA\MediaType(
     * *             mediaType="multipart/form-data",
     * *             @OA\Schema(
     * *                 required={"Code", "Name", "TypeID", "LocationID", "DepartmentID", "StatusID", "ClassificationID", "CriticalityID", "CreatedBy"},
     * *                 @OA\Property(property="Code", type="string", example="A12345"),
     * *                 @OA\Property(property="Name", type="string", example="Company Laptop"),
     * *                 @OA\Property(property="Description", type="string", example="Dell Latitude 5520 - Business Laptop"),
     * *                 @OA\Property(property="LocationID", type="integer", example=2),
     * *                 @OA\Property(property="Owner", type="string", example="John Doe"),
     * *                 @OA\Property(property="DepartmentID", type="integer", example=3),
     * *                 @OA\Property(property="AcquisitionDate", type="string", format="date", example="2024-01-15"),
     * *                 @OA\Property(property="TypeID", type="integer", example=1),
     * *                 @OA\Property(property="StatusID", type="integer", example=4),
     * *                 @OA\Property(property="ClassificationID", type="integer", example=2),
     * *                 @OA\Property(property="CriticalityID", type="integer", example=3),
     * *                 @OA\Property(property="CreatedBy", type="integer", example=5),
     * *             ),
     * *         ),
     * *     ),
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
    public function store(AssetsRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->assetAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
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

   /**
     * @OA\Post(
     *     path="/digital/api/assets/{id}",
     *     operationId="UpdateAsset",
     *     tags={"Assets"},
     *     summary="Update an existing asset",
     *     description="Update an existing asset in the system",
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
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 @OA\Property(property="Code", type="string", example="A12345"),
     *                 @OA\Property(property="Name", type="string", example="Asset Name"),
     *                 @OA\Property(property="TypeID", type="integer", example=1),
     *                 @OA\Property(property="LocationID", type="integer", example=1),
     *                 @OA\Property(property="DepartmentID", type="integer", example=1),
     *                 @OA\Property(property="StatusID", type="integer", example=1),
     *                 @OA\Property(property="ClassificationID", type="integer", example=1),
     *                 @OA\Property(property="CriticalityID", type="integer", example=1),
     *                 @OA\Property(property="ActionID", type="integer", example=1),
     *                 @OA\Property(property="UserID", type="integer", example=1),
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Resource updated",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="422",
     *         description="Unprocessable Entity",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="404",
     *         description="No data found",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function update(UpdateAssetsRequest $request, $id): JsonResponse
    {
        $validatedData = $request->validated();
        Log::info('Data received for update:', $validatedData);
        list($status, $message) = $this->assetAction->update($id, $validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}
