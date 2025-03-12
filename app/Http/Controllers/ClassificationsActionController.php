<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Classifications\ClassificationsActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Classifications\ClassificationsRequest;
class ClassificationsActionController extends Controller
{
    protected $classificationAction;

    public function __construct(ClassificationsActionInterface $classificationAction)
    {
        $this->classificationAction = $classificationAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/classifications",
     *     operationId="StoreClassification",
     *     tags={"Classifications"},
     *     summary="Store a new classification",
     *     description="Store a new classification in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"ClassificationName"},
     *                 @OA\Property(property="ClassificationName", type="string"),
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
    public function store(ClassificationsRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->classificationAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/classifications/{id}",
     *     operationId="DeleteClassification",
     *     tags={"Classifications"},
     *     summary="Delete a classification",
     *     description="Delete a classification from the system",
     *     @OA\Parameter (
     *         description="Id of the classification",
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
        list($status, $message) = $this->classificationAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}