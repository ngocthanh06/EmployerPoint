<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Criterias extends Model
{
    protected $fillable = [
        'criterias_name',
        'point'
    ];

    public function point()
    {
        return $this->hasOne(Point::class, 'id', 'criteria_id');
    }
}
