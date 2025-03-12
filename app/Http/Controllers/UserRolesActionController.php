<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\UserRoles\UserRolesActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\UserRoles\UserRolesRequest;
class UserRolesActionController extends Controller
{
    protected $userRoleAction;

    public function __construct(UserRolesActionInterface $userRoleAction)
    {
        $this->userRoleAction = $userRoleAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/user-roles",
     *     operationId="StoreUserRole",
     *     tags={"UserRoles"},
     *     summary="Store a new user role",
     *     description="Store a new user role in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"UserID", "RoleID"},
     *                 @OA\Property(property="UserID", type="integer"),
     *                 @OA\Property(property="RoleID", type="integer"),
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
    public function store(UserRolesRequest $request) : JsonResponse {

        $validatedData = $request->validated();
        list($status, $message) = $this->userRoleAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/user-roles/{user_id}/{role_id}",
     *     operationId="DeleteUserRole",
     *     tags={"UserRoles"},
     *     summary="Delete a user role",
     *     description="Delete a user role from the system",
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
    public function destroy($user_id, $role_id) : JsonResponse {
        list($status, $message) = $this->userRoleAction->delete($user_id, $role_id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}