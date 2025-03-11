<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Users\UsersActionInterface;
use App\Contracts\Users\UsersQueryInterface;
use Illuminate\Http\JsonResponse;

class UsersController extends Controller
{
    protected $userAction;
    protected $userQuery;

    public function __construct(UsersActionInterface $userAction, UsersQueryInterface $userQuery)
    {
        $this->userAction = $userAction;
        $this->userQuery = $userQuery;
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
     *                 required={"username", "password_hash", "email"},
     *                 @OA\Property(property="username", type="string"),
     *                 @OA\Property(property="password_hash", type="string"),
     *                 @OA\Property(property="email", type="string"),
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
        list($status, $message, $data) = $this->userAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
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