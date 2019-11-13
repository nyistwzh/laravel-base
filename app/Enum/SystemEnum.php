<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Enum;

/**
 * Class RegularEnum
 * 系统默认值
 * @package App\Enum
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class SystemEnum
{
    // 不关联
    const NOT_ASSOCIATE = 0;
    // 置空
    const NO_CONTENT = '';
    // 实名认证状态
    const UN_SUBMITTED = 0;
    const PENDING_REVIEW = 1;
    const AUDIT_FAILURE = 2;
    const SUCCESSFUL_REVIEW = 3;
    // 注册默认等级
    const REGISTER_DEFAULT_LEVEL = 1;
}
