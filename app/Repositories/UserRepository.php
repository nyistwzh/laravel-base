<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Repositories;

use App\Models\User;

class UserRepository extends BaseRepository
{
    public function __construct(User $user)
    {
        parent::__construct($user);
    }
}
