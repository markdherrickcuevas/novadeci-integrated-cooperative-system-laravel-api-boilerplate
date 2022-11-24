<?php

namespace App\Traits;

trait HttpResponses
{

    protected static function success($data, string $message = null, int $code = 200)
    {
        return response()->json([
            'status' => 'Success',
            'message' => $message,
            'data' => $data
        ], $code);
    }

    protected static function error($data, string $message = null, int $code)
    {
        if ($code === 404) {
            return response()->json([
                'status' => 'Error',
                'message' => 'Not found',
                'data' => $data
            ], $code);
        }

        return response()->json([
            'status' => 'Error',
            'message' => $message,
            'data' => $data
        ], $code);
    }
}
