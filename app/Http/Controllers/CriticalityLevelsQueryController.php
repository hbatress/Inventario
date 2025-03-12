<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CriticalityLevels\CriticalityLevelsQueryInterface;
use Illuminate\Http\JsonResponse;

class CriticalityLevelsQueryController extends Controller
{
    protected $criticalityLevelQuery;

    public function __construct(CriticalityLevelsQueryInterface $criticalityLevelQuery)
    {
        $this->criticalityLevelQuery = $criticalityLevelQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/criticality-levels/{id}",
     *     operationId="GetCriticalityLevel",
     *     tags={"CriticalityLevels"},
     *     summary="Get a criticality level",
     *     description="Get details of a criticality level from the system",
     *     @OA\Parameter (
     *         description="Id of the criticality level",
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
        $result =  $this->criticalityLevelQuery->getAction($id);
        return $this->responseWithData($result);
    }
}