<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Requests\Api\Auth;

use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;

/**
 * Class SendVerificationCodeRequest
 * 获取验证码校验
 * 获取验证码校验.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class RegisterSmsRequest extends FormRequest
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
            'mobile' => 'required|string|mobile|size:11|unique:' . app(User::class)->getTable() . ',mobile',
        ];
    }

}
