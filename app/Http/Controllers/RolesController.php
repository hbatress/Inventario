<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Roles\RolesActionInterface;
use App\Contracts\Roles\RolesQueryInterface;
use Illuminate\Http\JsonResponse;

class RolesController extends Controller
{
    protected $roleAction;
    protected $roleQuery;

    public function __construct(RolesActionInterface $roleAction, RolesQueryInterface $roleQuery)
    {
        $this->roleAction = $roleAction;
        $this->roleQuery = $roleQuery;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/roles",
     *     operationId="StoreRole",
     *     tags={"Roles"},
     *     summary="Store a new role",
     *     description="Store a new role in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"role_name"},
     *                 @OA\Property(property="role_name", type="string"),
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
        list($status, $message, $data) = $this->roleAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/roles/{id}",
     *     operationId="DeleteRole",
     *     tags={"Roles"},
     *     summary="Delete a role",
     *     description="Delete a role from the system",
     *     @OA\Parameter (
     *         description="Id of the role",
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
        list($status, $message) = $this->roleAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }

    /**
     * @OA\Get(
     *     path="/digital/api/roles/{id}",
     *     operationId="GetRole",
     *     tags={"Roles"},
     *     summary="Get a role",
     *     description="Get details of a role from the system",
     *     @OA\Parameter (
     *         description="Id of the role",
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
        list($status, $data) = $this->roleQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}