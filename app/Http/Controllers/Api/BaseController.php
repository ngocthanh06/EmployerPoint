<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BaseController extends Controller
{
    public function __construct()
    {

    }

    public function responseErrors($returnCode, $message = [], $statusCode = 200, $data = null)
    {
        return api_errors(config($returnCode, ''), $message, $statusCode, $data);
    }

    public function responseSuccess($data, $statusCode = 200)
    {
        return api_success($data, $statusCode);
    }
}
