<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Points;

class PointController extends Controller
{
    protected $point;

    public function __construct(Points $point)
    {
        $this->point = $point;
    }

    public function index(Request $request)
    {
        return $request;
        return $this->point->where('user_id', $request['id'])
        ->whereDate('attendance', $request['attendance'])->get();
    }
}
