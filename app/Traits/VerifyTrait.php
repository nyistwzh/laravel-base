<?php


namespace App\Traits;

use App\Enum\RegularEnum;
use Douyasi\IdentityCard\ID;

/**
 * Class VerifyTrait
 * 校验
 * @package App\Traits
 * @version 1.0.0
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
trait VerifyTrait
{
    /**
     * 是否是邮箱
     * 是否是邮箱
     * @param $email
     * @return mixed
     * @author 王志豪
     */
    function isEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    /**
     * 是否是手机号
     * 是否是手机号
     * @param $mobile
     * @return mixed
     * @author 王志豪
     */
    function isMobile($mobile)
    {
        $pattern = RegularEnum::MOBILE;

        return preg_match($pattern, $mobile);
    }

    /**
     * 是否存在本地文件
     * 是否存在本地文件
     * @param $path
     * @return bool
     * @author 王志豪
     */
    function fileExistsLocal($path)
    {
        $filePath = storage_path('app/public' . substr($path, strlen('/storage')));
        return file_exists($filePath);
    }

    /**
     * 是否是身份证号
     * 是否是身份证号
     * @param $idNumber
     * @return bool
     * @author 王志豪
     */
    function isIdNumber($idNumber)
    {
        $id = new ID;
        return $id->validateIDCard($idNumber);
    }

    /**
     * 是否是用户名
     * 是否是用户名
     * @param $username
     * @return false|int
     * @author 王志豪
     */
    function isUsername($username)
    {
        $pattern = RegularEnum::USERNAME;

        return preg_match($pattern, $username);
    }
}
