<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Roles\RolesQueryInterface;
use Illuminate\Http\JsonResponse;

class RolesQueryController extends Controller
{
    protected $roleQuery;

    public function __construct(RolesQueryInterface $roleQuery)
    {
        $this->roleQuery = $roleQuery;
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
        $result =  $this->roleQuery->getAction($id);
        return $this->responseWithData($result);
    }

    /**
     * @OA\Get(
     *     path="/digital/api/roles/list",
     *     operationId="GetAllRoles",
     *     tags={"Roles"},
     *     summary="Get all roles",
     *     description="Get details of all roles from the system",
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
    public function index() : JsonResponse {
        $result =  $this->roleQuery->getAll();
        return $this->responseWithData($result);
    }
}