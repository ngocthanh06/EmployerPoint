<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Enums\RoleStatus;
use App\Http\Resources\UserResource;
use App\Http\Controllers\Api\AuthController as BaseAuthController;

class AuthController extends BaseAuthController
{
    public function __construct()
    {
        $this->guardName = config('auth.guard_type.user');
        $this->roleId = RoleStatus::USER;
    }

    public function respondWithToken($token)
    {
        return $this->responseSuccess([
            'user' => new UserResource($this->guard()->user()),
            'access_token' => config('jwt.prefix_token'). $token
        ]);
    }
}
