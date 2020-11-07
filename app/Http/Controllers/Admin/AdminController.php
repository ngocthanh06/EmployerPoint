<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;
use App\Http\Resources\UserResource;
use App\Services\Admin\UserService;
use App\Services\Admin\PointService;
use App\Http\Requests\admin\AddUserRequest;
use App\Http\Requests\admin\EditUserRequest;
use App\Http\Requests\Admin\SuccessPointRequest;
use App\Http\Resources\PointResource;

class AdminController extends Controller
{
    protected $pointService;

    public function __construct(UserService $user, PointService $pointService)
    {
        $this->model = $user;
        $this->pointService = $pointService;
    }

    public function listUser()
    {
        return UserResource::collection($this->model->listUser());
    }

    public function addUser(AddUserRequest $request)
    {
        $user = $this->model->addUser($request->all());

        if ($user) {
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }

    public function editUser(EditUserRequest $request)
    {
        $user = $this->model->editUser($request->all());

        if ($user) {
            return response()->json(['status' => true]);
        }

        return response()->json(['status' => false]);
    }

    public function getPoint(Request $request)
    {
        $point = $this->pointService->getPoint($request->all());

        if ($point) {
            return response()->json([
                'status' => true, 
                'data' => new PointResource($point)
            ]);
        }

        return response()->json(['status' => false ]);
    }

    public function getCriterias()
    {
        return $this->pointService->getCriterias();
    }

    public function successPoint(SuccessPointRequest $request)
    {
        if ($this->pointService->successPoint($request->all())) {
            return response()->json(['status' => true ]);
        }

        return response()->json(['status' => false ]);
    }

    public function getUser(Request $userId)
    {
        $user = $this->model->getUser($userId)[0];

        return new UserResource($user);
    }
}
