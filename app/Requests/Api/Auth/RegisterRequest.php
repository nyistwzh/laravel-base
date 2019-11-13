<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Requests\Api\Auth;

use App\Enum\SmsEnum;
use App\Models\User;
use Illuminate\Foundation\Http\FormRequest;
use App\Traits\RedisTrait;
use Exception;

/**
 * Class RegisterRequest
 * 注册校验
 * 注册请求参数校验.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class RegisterRequest extends FormRequest
{

    use RedisTrait;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // 校验验证码是否正确
        $mobile = $this->get('mobile', '');
        $verificationCode = $this->get('verification_code', '');
        if ($mobile && $verificationCode) {
            if (!$redisVerificationCode = $this->getValue(SmsEnum::REGISTER . '_' . $mobile)) {
                return false;
            }
            if (!hash_equals($redisVerificationCode, $verificationCode)) {
                return false;
            }
        }
        return true;
    }

    /**
     * authorize校验失败
     * authorize校验失败
     * @throws Exception
     * @author 王志豪
     */
    protected function failedAuthorization()
    {
        throw new Exception(trans('system.verification_code_error'));
    }

    public function rules()
    {
        return [
            'username' => 'required|string|username|min:6|max:255',
            'mobile' => 'required|string|mobile|size:11|unique:' . app(User::class)->getTable() . ',mobile',
            'password' => 'required|string',
            'verification_code' => 'required|string|size:6',
        ];
    }

}
