<?php


namespace App\Traits;

use App\Utils\SizeUtil;

/**
 * Class SizeUtilTrait
 * size工具
 * @package App\Traits
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
trait SizeUtilTrait
{
    /**
     * 单位升级
     * 单位升级
     * @param $size
     * @param  int  $decimal
     * @param  int  $level
     * @return float
     * @author 王志豪
     */
    public static function unitUpgrade($size, $decimal = 0, $level = 1)
    {
        return SizeUtil::unitUpgrade($size, $decimal, $level);
    }

    /**
     * 单位降级
     * 单位降级
     * @param $size
     * @param  int  $decimal
     * @param  int  $level
     * @return float
     * @author 王志豪
     */
    public static function unitDowngrade($size, $decimal = 0, $level = 1)
    {
        return SizeUtil::unitDowngrade($size, $decimal, $level);
    }
}
