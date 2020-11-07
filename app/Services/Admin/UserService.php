<?php

namespace App\Services\Admin;

use App\Enums\RoleStatus;
use App\Models\User;
use App\Models\UserProfile;
use App\Services\BaseService;

class UserService extends BaseService
{
    protected $userProfile;

    public function __construct(User $user, UserProfile $userProfile)
    {
        $this->model = $user;
        $this->userProfile = $userProfile;
    }

    public function listUser()
    {
        return $this->model->where('role_id', '!=' ,RoleStatus::ADMIN)->latest()->get();
    }

    public function addUser($request)
    {
        $request['role_id'] = RoleStatus::USER;
        $request['user_id'] = $this->model->create($request)->id;
        $profile = $this->userProfile->firstOrCreate(['user_id' => $request['user_id']]);
        return $profile->update($request);
    }

    public function editUser($request)
    {
        $userProfile = $this->userProfile->firstOrCreate([
            'user_id' => $request['id']
        ]);

        return $userProfile->update($request);
    }

    public function getUser($userId)
    {
        return User::find($userId);
    }
}
