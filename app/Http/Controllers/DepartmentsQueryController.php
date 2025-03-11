<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Departments\DepartmentsQueryInterface;
use Illuminate\Http\JsonResponse;

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
        list($status, $data) = $this->departmentQuery->getAction($id);
        if (!$status) return $this->responseError('No data found');
        return $this->responseWithData($data);
    }
}