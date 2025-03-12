<?php

namespace App\Http\Controllers;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Response;
/**
 * @OA\Info(
 *     title="Inventarios de activos",
 *     version="1.0.0",
 *     description="APIs para el manejo de inventarios de activos"
 * )
 */
abstract class Controller
{
    //

    /**
     * Make standard response with some data
     *
     * @param object|array $data Data to be send as JSON
     * @param int $code optional HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseWithData($data, $code = 200) : JsonResponse {
        $message = $code == 201 ? "Resource created" : "Data found";
        if ( !$data){
            $message = "No data found";
            $code = 404;
        }

        if ( $data instanceof Collection && !$data->count()  ) {
            $message = "No data found";
            $code = 404;
        }

        if ( $data instanceof ResourceCollection && !$data->count() ){
            $message = "No data found";
            $code = 404;
        }
        return Response::json([
            'status' => $code == 200,
            'data' => $data,
            'result' => $message,
        ], $code);
    }
    /**
     * Make standard successful response ['success' => true, 'message' => $message]
     *
     * @param string $message Success message
     * @param int $code HTTP response code, default to 200
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseSuccess($message = 'Action completed!', $code = 200) : JsonResponse {
        return Response::json([
            'status' => true,
            'message' => $message,
        ], $code);
    }
    /**
     * Make standard response with error ['success' => false, 'message' => $message]
     *
     * @param string $message Error message
     * @param int $code HTTP response code, default to 500
     * @return \Illuminate\Http\JsonResponse
     */
    protected function responseError($message = 'Server error!', $code = 500) : JsonResponse {
        return Response::json([
            'status' => false,
            'message' => $message,
        ], $code);
    }

    protected function responseMessage($message, $code) : JsonResponse {
        return Response::json([
            'status' => true,
            'message' => $message,
        ], $code);
    }
}
