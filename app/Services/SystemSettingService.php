<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Services;

use App\Repositories\SystemSettingRepository;

/**
 * Class SystemSettingService
 * 系统设置信息
 * 系统设置信息增删改查相关操作.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class SystemSettingService extends BaseService
{

    public function __construct(SystemSettingRepository $systemSettingRepository)
    {
        parent::__construct($systemSettingRepository);
    }

}
