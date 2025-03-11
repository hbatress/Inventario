<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Departments\DepartmentsActionInterface;
use Illuminate\Http\JsonResponse;

class DepartmentsActionController extends Controller
{
    protected $departmentAction;

    public function __construct(DepartmentsActionInterface $departmentAction)
    {
        $this->departmentAction = $departmentAction;
    }

    /**
     * @OA\Post(
     *     path="/digital/api/departments",
     *     operationId="StoreDepartment",
     *     tags={"Departments"},
     *     summary="Store a new department",
     *     description="Store a new department in the system",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *             mediaType="multipart/form-data",
     *             @OA\Schema(
     *                 type="object",
     *                 required={"department_name"},
     *                 @OA\Property(property="department_name", type="string"),
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
        list($status, $message, $data) = $this->departmentAction->create($request->all());
        if (!$status) return $this->responseError($message);
        return $this->responseWithData($data, 201);
    }

    /**
     * @OA\Delete(
     *     path="/digital/api/departments/{id}",
     *     operationId="DeleteDepartment",
     *     tags={"Departments"},
     *     summary="Delete a department",
     *     description="Delete a department from the system",
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
        list($status, $message) = $this->departmentAction->delete($id);
        if (!$status) return $this->responseError($message);
        return $this->responseSuccess($message);
    }
}