<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Http\Controllers\Api;

use App\Enum\SmsEnum;
use App\Requests\Api\Auth\LoginRequest;
use App\Requests\Api\Auth\RegisterRequest;
use App\Requests\Api\Auth\RegisterSmsRequest;
use App\Services\AuthService;
use App\Transformers\User\ShowTransformer;

/**
 * Class AuthController
 * 认证类
 * 用户认证授权相关操作.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class AuthController extends Controller
{

    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * 用户注册
     * 用户注册
     * @param  RegisterRequest  $request
     * @return \Dingo\Api\Http\Response
     * @author 王志豪
     */
    public function register(RegisterRequest $request)
    {
        $userInfo = $this->authService->register(request(['username', 'mobile', 'password']));
        return $this->response->item($userInfo, new ShowTransformer);
    }

    /**
     * 注册短信
     * 注册短信
     * @param  RegisterSmsRequest  $request
     * @return mixed
     * @throws \Exception
     * @author 王志豪
     */
    public function registerSms(RegisterSmsRequest $request)
    {
        $info = $this->authService->sendSms(SmsEnum::REGISTER, request('mobile'));
        return $this->response->array($info);
    }

    /**
     * 用户登录
     * 用户登录.
     * @param  LoginRequest  $request
     * @return mixed
     * @throws \App\Exceptions\CustomException
     * @author 王志豪
     */
    public function login(LoginRequest $request)
    {

        $userInfo = $this->authService->login(request(['username', 'password']));

        $showTransformer = new ShowTransformer();

        return $this->response->array([
            'token_info' => $this->authService->respondWithToken($userInfo['token']),
            'user_info'  => $showTransformer->transform($userInfo['user'])
        ]);
    }

    /**
     * 用户信息
     * 获取登录用户信息.
     *
     * @return mixed
     *
     * @author 王志豪
     */
    public function me()
    {
        return $this->response->item(auth()->user(), new ShowTransformer());
    }

    /**
     * 退出登录
     * 用户退出登录.
     *
     * @return mixed
     *
     * @author 王志豪
     */
    public function logout()
    {
        auth()->logout();

        return $this->response->array([]);
    }

    /**
     * token刷新
     * 登录用户token更新并返回新token.
     *
     * @return mixed
     *
     * @author 王志豪
     */
    public function refresh()
    {
        $tokenInfo = $this->authService->respondWithToken(auth()->refresh());
        return $this->response->array($tokenInfo);
    }


}
