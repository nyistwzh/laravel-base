<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Services;

use App\Enum\SmsEnum;
use App\Events\RecordLoginTime;
use App\Repositories\UserRepository;

/**
 * Class AuthService
 * 鉴权
 * 鉴权增删改查相关操作.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class AuthService extends BaseService
{

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

    /**
     * 注册
     * 注册
     * @param $params
     * @return mixed
     * @author 王志豪
     */
    public function register($params)
    {
        $userInfo = $this->baseRepository->store($params);
        // 删除验证码
        $this->delValue(SmsEnum::REGISTER . '_' . $params['mobile']);

        return $userInfo;
    }

    /**
     * 登录
     * 登录
     * @param $params
     * @return array
     * @throws \App\Exceptions\CustomException
     * @author 王志豪
     */
    public function login($params)
    {
        // 邮箱登录
        if ($this->isEmail($params['username'])) {
            $params['email'] = $params['username'];
            unset($params['username']);
        } elseif ($this->isMobile($params['username'])) {
            // 手机号登录
            $params['mobile'] = $params['username'];
            unset($params['username']);
        }

        if (!$token = auth()->attempt($params)) {
            customError(trans('auth.login_failed'), 500);
        }

        $user = auth()->user();
        // 记录登录时间
        event(new RecordLoginTime($user->id));

        return ['user' => $user, 'token' => $token];
    }

    /**
     * token格式化
     * token有效期，类型等组合返回.
     *
     * @param string $token
     *
     * @return array
     *
     * @author 王志豪
     */
    public function respondWithToken(string $token)
    {
        return [
            'access_token' => $token,
            'token_type'   => 'bearer',
            'expires_in'   => auth()->factory()->getTTL() * 60,
        ];
    }

}
