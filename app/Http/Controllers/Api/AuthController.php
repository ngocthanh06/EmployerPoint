<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Enums\RoleStatus;
use App\Models\User;
use App\Models\UserProfile;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Api\BaseController;
use App\Http\Resources\UserResource;

class AuthController extends BaseController
{
    protected $guardName;

    protected $roleId;

    public function __construct()
    {
        $this->middleware('auth.' . $this->guardName, ['except' => ['login', 'register']]);
    }

    public function guard()
    {
        return Auth::guard($this->guardName);
    }
    
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $credentials['role_id'] = $this->roleId;

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return $this->responseErrors('code.common.create_failed', trans('messages.errors.user'));
    }
}
