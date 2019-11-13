<?php

namespace App\Utils;

class SizeUtil
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
    public static function unitUpgrade($size, $decimal, $level)
    {
        return floatval(number_format($size / (pow(1024, $level)), $decimal, '.', ''));
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
    public static function unitDowngrade($size, $decimal, $level)
    {
        return floatval(number_format($size * (pow(1024, $level)), $decimal, '.', ''));
    }

}
