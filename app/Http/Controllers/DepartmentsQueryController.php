<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Departments\DepartmentsQueryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class DepartmentsQueryController extends Controller
{
    protected $departmentQuery;

    public function __construct(DepartmentsQueryInterface $departmentQuery)
    {
        $this->departmentQuery = $departmentQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/departments/{id}",
     *     operationId="GetDepartment",
     *     tags={"Departments"},
     *     summary="Get a department",
     *     description="Get details of a department from the system",
     *     @OA\Parameter (
     *         description="Id of the department",
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
        $result =  $this->departmentQuery->getAction($id);
        return $this->responseWithData($result);
    }
        /**
     * @OA\Get(
     *     path="/digital/api/departments/list",
     *     operationId="Getdepartments",
     *     tags={"Departments"},
     *     summary="Get all departments",
     *     description="Get details of all departments from the system",
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
    public function Information() : JsonResponse {
        try {
            $result = $this->departmentQuery->getAll();
            return $this->responseWithData($result);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error retrieving user information'], 500);
        }
    }
}
