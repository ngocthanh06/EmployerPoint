<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Services\Admin\UserService;

class AdminController extends Controller
{
    public function __construct(UserService $user)
    {
        $this->model = $user;
    }

    public function listUser()
    {
        return UserResource::collection($this->model->listUser());
    }
}
