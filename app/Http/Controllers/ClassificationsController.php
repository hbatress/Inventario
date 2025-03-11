<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Classifications\ClassificationsActionInterface;
use App\Contracts\Classifications\ClassificationsQueryInterface;
use Illuminate\Http\JsonResponse;

class ClassificationsController extends Controller
{
    protected $classificationAction;
    protected $classificationQuery;

    public function __construct(ClassificationsActionInterface $classificationAction, ClassificationsQueryInterface $classificationQuery)
    {
        $this->classificationAction = $classificationAction;
        $this->classificationQuery = $classificationQuery;
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
     *                 required={"classification_name"},
     *                 @OA\Property(property="classification_name", type="string"),
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
        list($status, $message, $data) = $this->classificationAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
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

    /**
     * @OA\Get(
     *     path="/digital/api/classifications/{id}",
     *     operationId="GetClassification",
     *     tags={"Classifications"},
     *     summary="Get a classification",
     *     description="Get details of a classification from the system",
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
        list($status, $data) = $this->classificationQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}