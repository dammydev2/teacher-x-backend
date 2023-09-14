<?php

namespace App\Traits;

trait ResponseTrait
{
    protected function success($message, $data = [], $status = 200)
    {
        return response([
            'success' => true,
            'message' => $message,
            'data' => $data,
        ], $status);
    }

    protected function error($message, $status = 422)
    {
        return response([
            'success' => false,
            'message' => $message,
        ], $status);
    }
}