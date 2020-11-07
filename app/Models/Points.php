<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Points extends Model
{
    protected $fillable = [
        'user_id',
        'criteria_id',
        'attendance'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function criteria()
    {
        return $this->belongsTo(Criterias::class, 'criteria_id');
    }
}
