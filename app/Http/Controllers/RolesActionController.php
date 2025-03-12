<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Roles\RolesActionInterface;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\Requests\Roles\RolesRequest;
class RolesActionController extends Controller
{
    protected $roleAction;

    public function __construct(RolesActionInterface $roleAction)
    {
        $this->roleAction = $roleAction;
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
     *                 required={"RoleName"},
     *                 @OA\Property(property="RoleName", type="string"),
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
    public function store(RolesRequest $request) : JsonResponse {
        $validatedData = $request->validated();
        list($status, $message) = $this->roleAction->create($validatedData);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
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
}