<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Classifications\ClassificationsQueryInterface;
use Illuminate\Http\JsonResponse;

class ClassificationsQueryController extends Controller
{
    protected $classificationQuery;

    public function __construct(ClassificationsQueryInterface $classificationQuery)
    {
        $this->classificationQuery = $classificationQuery;
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
        $result =  $this->classificationQuery->getAction($id);
        return $this->responseWithData($result);
    }
}