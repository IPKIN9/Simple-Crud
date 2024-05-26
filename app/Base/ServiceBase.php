<?php

namespace App\Base;

use Illuminate\Support\Facades\Log;

class ServiceBase
{
    public function success($data, $message = null, $code = 200)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    public function error($message, \Throwable $th, $code = 400)
    {
        Log::error($message, [
            'message' => $th->getMessage(),
            'file' => $th->getFile(),
            'line' => $th->getLine(),
            'trace' => $th->getTraceAsString()
        ]);
        return response()->json([
            'status' => 'error',
            'message' => $message,
        ], $code);
    }
}