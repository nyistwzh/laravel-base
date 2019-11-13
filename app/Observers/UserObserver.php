<?php

namespace App\Observers;

use App\Enum\SystemEnum;
use App\Models\User;

class UserObserver
{

    public function creating(User $user)
    {
        $user->avatar = config('back-system.avatar.default');
        $user->mobile_verify_at = datetimeString();
    }

}
