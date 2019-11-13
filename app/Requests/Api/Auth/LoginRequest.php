<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Requests\Api\Auth;

use Illuminate\Foundation\Http\FormRequest;

/**
 * Class LoginRequest
 * 登录校验
 * 登录请求参数校验.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class LoginRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'username' => 'required|string|login_username|min:6|max:255',
            'password' => 'required|string',
        ];
    }

}
