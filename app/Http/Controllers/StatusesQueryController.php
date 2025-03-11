<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Statuses\StatusesQueryInterface;
use Illuminate\Http\JsonResponse;

class StatusesQueryController extends Controller
{
    protected $statusQuery;

    public function __construct(StatusesQueryInterface $statusQuery)
    {
        $this->statusQuery = $statusQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/statuses/{id}",
     *     operationId="GetStatus",
     *     tags={"Statuses"},
     *     summary="Get a status",
     *     description="Get details of a status from the system",
     *     @OA\Parameter (
     *         description="Id of the status",
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
        list($status, $data) = $this->statusQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}