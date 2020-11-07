<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserProfile extends Model
{
    protected $table = 'user_profiles';

    protected $fillable = [
        'phone',
        'user_id',
        'first_name',
        'last_name',
        'gender'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
