<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserRoles\UserRolesQueryInterface;
use Illuminate\Http\JsonResponse;

class UserRolesQueryController extends Controller
{
    protected $userRoleQuery;

    public function __construct(UserRolesQueryInterface $userRoleQuery)
    {
        $this->userRoleQuery = $userRoleQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/user-roles/{user_id}/{role_id}",
     *     operationId="GetUserRole",
     *     tags={"UserRoles"},
     *     summary="Get a user role",
     *     description="Get details of a user role from the system",
     *     @OA\Parameter (
     *         description="Id of the user",
     *         in="path",
     *         name="user_id",
     *         required=true,
     *         example=1,
     *         @OA\Schema (
     *             type="integer",
     *             format="int64"
     *         )
     *     ),
     *     @OA\Parameter (
     *         description="Id of the role",
     *         in="path",
     *         name="role_id",
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
    public function show($user_id, $role_id) : JsonResponse {
        list($status, $data) = $this->userRoleQuery->getActionBy($user_id, $role_id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}