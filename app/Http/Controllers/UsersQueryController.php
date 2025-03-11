<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Users\UsersQueryInterface;
use Illuminate\Http\JsonResponse;

class UsersQueryController extends Controller
{
    protected $userQuery;

    public function __construct(UsersQueryInterface $userQuery)
    {
        $this->userQuery = $userQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/users/{id}",
     *     operationId="GetUser",
     *     tags={"Users"},
     *     summary="Get a user",
     *     description="Get details of a user from the system",
     *     @OA\Parameter (
     *         description="Id of the user",
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
        list($status, $data) = $this->userQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}