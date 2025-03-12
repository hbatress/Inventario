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
     *     path="/digital/api/user-roles/{RoleID}",
     *     operationId="GetUserRole",
     *     tags={"UserRoles"},
     *     summary="Get a user role",
     *     description="Get details of a user role from the system",
     *     @OA\Parameter (
     *         description="Id of the role",
     *         in="path",
     *         name="RoleID",
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
    public function show($role_id) : JsonResponse {
        $result = $this->userRoleQuery->getAction($role_id);
    
        if ($result->isEmpty()) {
            return $this->responseError('No data found', 404);
        }
    
        return $this->responseWithData($result);
    }
}