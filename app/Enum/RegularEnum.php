<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Enum;

/**
 * Class RegularEnum
 * 正则表达式
 * @package App\Enum
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class RegularEnum
{
    // 手机号
    const MOBILE = '/^13[\d]{9}$|^14[5,7]{1}\d{8}$|^15[^4]{1}\d{8}$|^17[0,6,7,8]{1}\d{8}$|^18[\d]{9}$/';
    // 用户名
    const USERNAME = '/^([A-Za-z])\w+$/';
}
