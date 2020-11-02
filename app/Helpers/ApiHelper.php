<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

function api_errors($returnCode, $message = [], $statusCode = 200, $data = null)
{
    $responseData = [
        'code' => $returnCode,
        'message' => $message,
    ];

    if ($data) {
        $responseData['data'] = $data;
    }

    return response()->json($responseData, $statusCode);
}

function api_success($data, $statusCode = 200)
{
    return response()->json(array_merge(['code' => 200], $data), $statusCode);
}


