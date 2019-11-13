<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Http\Middleware;

use App\Exceptions\CustomException;
use Closure;
use Tymon\JWTAuth\Exceptions\JWTException;
use Tymon\JWTAuth\Exceptions\TokenExpiredException;
use Tymon\JWTAuth\Http\Middleware\BaseMiddleware;

// 注意，我们要继承的是 jwt 的 BaseMiddleware
class RefreshToken extends BaseMiddleware
{
    /**
     * 无痛刷新
     * 实现token过期可用户无感刷新token.
     *
     * @param $request
     * @param Closure $next
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response|mixed
     *
     * @throws CustomException
     *
     * @author 王志豪
     */
    public function handle($request, Closure $next)
    {
        if (true === env('AUTO_REFRESH')) {
            // 检查此次请求中是否带有 token，如果没有则抛出异常。
            $this->checkForToken($request);

            // 使用 try 包裹，以捕捉 token 过期所抛出的 TokenExpiredException  异常
            try {
                // 检测用户的登录状态，如果正常则通过
                if ($this->auth->parseToken()->authenticate()) {
                    return $next($request);
                }
                customError('未鉴权', 401);
            } catch (TokenExpiredException $exception) {
                // 此处捕获到了 token 过期所抛出的 TokenExpiredException 异常，我们在这里需要做的是刷新该用户的 token 并将它添加到响应头中
                try {
                    // 刷新用户的 token
                    $token = $this->auth->refresh();
                    // 使用一次性登录以保证此次请求的成功
                    auth()->onceUsingId($this->auth->manager()->getPayloadFactory()->buildClaimsCollection()->toPlainArray()['sub']);
                    // 在响应头中返回新的 token
                    return $this->setAuthenticationHeader($next($request), $token);
                } catch (JWTException $exception) {
                    // 如果捕获到此异常，即代表 refresh 也过期了，用户无法刷新令牌，需要重新登录。
                    customError('鉴权刷新时间已过', 407);
                }
            } catch (\Exception $e) {
                customError('鉴权失败', 403);
            }
        } else {
            return $next($request);
        }
    }
}
