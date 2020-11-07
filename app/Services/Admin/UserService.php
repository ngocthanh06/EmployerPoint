<?php

namespace App\Services\Admin;

use App\Enums\RoleStatus;
use App\Models\User;
use App\Services\BaseService;

class UserService extends BaseService
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function listUser()
    {
        return $this->model->where('role_id', '!=' ,RoleStatus::ADMIN)->paginate(10);
    }

}
