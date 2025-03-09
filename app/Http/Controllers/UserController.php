<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
 /**
     * @OA\Get(
     *     path="/api/ejemplo",
     *     summary="Obtener ejemplo",
     *     description="Obtiene un ejemplo",
     *     @OA\Response(
     *         response=200,
     *         description="Respuesta exitosa"
     *     )
     * )
     */
    public function obtenerEjemplo()
    {
        return response()->json([
            'mensaje' => 'Este es un ejemplo de respuesta',
            'data' => [
                'id' => 1,
                'nombre' => 'Ejemplo'
            ]
        ], 200);
    }
}