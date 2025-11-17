<?php

namespace App\Traits;

trait ApiResponses
{

    protected function ok($message,$data = []){
        return $this->success($message,$data,200);
    }
    protected function success($message = null,$data = [], $code = 200)
    {
        return response()->json([
            'data' => $data,
            'message' => $message,
            'status' => true,
        ], $code);
    }

    protected function error($message,$statusCode = 401){
        return response()->json([
            'message' => $message,
            'status' => false,
        ], $statusCode);
    }
}
