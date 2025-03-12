<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\Actions\ActionsQueryInterface;
use Illuminate\Http\JsonResponse;

class ActionsQueryController extends Controller
{
    protected $actionQuery;

    public function __construct(ActionsQueryInterface $actionQuery)
    {
        $this->actionQuery = $actionQuery;
    }

    /**
     * @OA\Get(
     *     path="/digital/api/actions/{id}",
     *     operationId="GetAction",
     *     tags={"Actions"},
     *     summary="Get an action",
     *     description="Get details of an action from the system",
     *     @OA\Parameter (
     *         description="Id of the action",
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
    public function show($id)
    {
        $result = $this->actionQuery->getAction($id);
        if ($result['status']) {
            // Acceder a los datos como un array
            $action = $result['data'];
            // ... código adicional ...
            return response()->json($action, 200);
        } else {
            // Manejar el caso en que no se encuentra la acción
            return response()->json(['status' => false, 'message' => 'No data found'], 404);
        }
    }
    
}