<?php

namespace App\Observers;

use App\Models\User;
use App\Models\UserProfile;

class UserObserver
{
    /**
     * Handle the user observer "created" event.
     *
     * @param  \App\UserObserver  $userObserver
     * @return void
     */
    public function created(User $user)
    {
        self::createUserProfile($user);
    }

    private function createUserProfile($user)
    {
        UserProfile::create([
            'user_id' => $user->id
        ]);
    }

}
