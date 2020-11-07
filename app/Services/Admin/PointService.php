<?php

namespace App\Services\Admin;

use App\Enums\RoleStatus;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Points;
use App\Models\Criterias;
use App\Services\BaseService;

class PointService extends BaseService
{
    protected $criterias;

    public function __construct(Points $point, Criterias $criterias)
    {
        $this->model = $point;
        $this->criterias = $criterias;
    }

    public function getPoint($request)
    {
        return $this->model
            ->where('user_id', $request['id'])
            ->whereDate('attendance', $request['date'])
            ->first();
    }

    public function getCriterias()
    {
        return $this->criterias->get();
    }

    public function successPoint($request)
    {
        $point = $this->model
            ->where('user_id', $request['user_id'])
            ->where('attendance', $request['attendance'])
            ->first();

        if ($point) {
            return $point->update($request);
        }

        return $this->model->create($request);
    }

}
