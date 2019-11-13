<?php


namespace App\Traits;

use App\Enum\RegularEnum;
use Illuminate\Support\Facades\Redis;

/**
 * Class RedisTrait
 * Redis
 * @package App\Traits
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
trait RedisTrait
{
    /**
     * 设置有效期值
     * 设置有效期值
     * @param $key
     * @param $expire
     * @param $value
     * @return mixed
     * @author 王志豪
     */
    public function setExValue($key, $expire, $value)
    {
        Redis::setEx($key, $expire, $value);
    }

    /**
     * 设置值
     * 设置值
     * @param $key
     * @param $value
     * @return mixed
     * @author 王志豪
     */
    public function setValue($key, $value)
    {
        Redis::set($key, $value);
    }

    /**
     * 获取值
     * 获取值
     * @param $key
     * @return mixed
     * @author 王志豪
     */
    public function getValue($key)
    {
        return Redis::get($key);
    }

    /**
     * 删除值
     * 删除值
     * @param $key
     * @return mixed
     * @author 王志豪
     */
    public function delValue($key)
    {
        Redis::del($key);
    }
}
