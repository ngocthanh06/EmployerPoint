<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Enums\RoleStatus;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\AuthController as BaseAuthController;

class AuthController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = config('auth.guard_type.admin');
        $this->roleId = RoleStatus::ADMIN;
    }

    public function respondWithToken($token)
    {
        return $this->responseSuccess([
            'admin' => new UserResource($this->guard()->user()),
            'access_token' => config('jwt.prefix_token'). $token
        ]);
    }

}
