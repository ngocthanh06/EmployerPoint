<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Http\Resources\UserProfileResource;
use App\Enums\RoleStatus;


class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'name',
        'email',
        'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id', 'id');
    }

    public function point()
    {
        return $this->hasMany(Point::class);
    }

    public function roleProfile()
    {
        switch ($this->role_id) {
            case RoleStatus::USER:
                return new UserProfileResource($this->userProfile);
            default:
                return [];
        }
    }

    public function userProfile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }
}
