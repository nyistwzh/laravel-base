<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Repositories;

use App\Models\SystemSetting;

class SystemSettingRepository extends BaseRepository
{
    public function __construct(SystemSetting $systemSetting)
    {
        parent::__construct($systemSetting);
    }
}
