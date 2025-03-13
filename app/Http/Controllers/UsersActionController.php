<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Users\UsersActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Users\UsersRequest;
class UsersActionController extends Controller
{
    protected $userAction;

    public function __construct(UsersActionInterface $userAction)
    {
        $this->userAction = $userAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/users",
     *     operationId="StoreUser",
     *     tags={"Users"},
     *     summary="Store a new user",
     *     description="Store a new user in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
    *                 required={"Username", "PasswordHash", "Email"},
    *                 @OA\Property(property="Username", type="string", example="john_doe"),
    *                  @OA\Property(property="PasswordHash", type="string", example="P@ssw0rd123!", description="Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one number, and one special character."),
    *                 @OA\Property(property="Email", type="string", example="john.doe@example.com"),
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
    public function store(UsersRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->userAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/users/{id}",
     *     operationId="DeleteUser",
     *     tags={"Users"},
     *     summary="Delete a user",
     *     description="Delete a user from the system",
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
        list($status, $message) = $this->userAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Post(
     *     path="/digital/api/users/login",
     *     operationId="LoginUser",
     *     tags={"Users"},
     *     summary="Login a user",
     *     description="Login a user with email and password",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"Email", "PasswordHash"},
     *                 @OA\Property(property="Email", type="string", format="email", example="john.doe@example.com"),
     *                 @OA\Property(property="PasswordHash", type="string", format="password", example="password123")
     *             ),
     *         ),
     *     ),
     *     @OA\Response(
     *         response="200",
     *         description="Login successful",
     *         @OA\JsonContent()
     *     ),
     *     @OA\Response(
     *         response="401",
     *         description="Unauthorized",
     *         @OA\JsonContent()
     *     ),
     * )
     */
    public function login(Request $request) : JsonResponse {
        $credentials = $request->only('Email', 'PasswordHash');
        $result = $this->userAction->loginAction($credentials);
        return $this->responseWithData($result);
    }
}