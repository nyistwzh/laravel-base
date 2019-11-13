<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Enum;

/**
 * Class SmsEnum
 * 短信
 * @package App\Enum
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class SmsEnum
{
    // 注册
    const REGISTER = 'register';
    // 更新手机号
    const UPDATE_MOBILE = 'update_mobile';
    // 更新手机号新手机号
    const UPDATE_NEW_MOBILE = 'update_new_mobile';
}
