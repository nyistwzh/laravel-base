<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Services;

use App\Events\SendEmail;
use App\Events\SendSms;
use App\Repositories\BaseRepository;
use App\Traits\RedisTrait;
use App\Traits\SmsTrait;
use App\Traits\VerifyTrait;
use Illuminate\Support\Arr;
use Naux\Mail\SendCloudTemplate;

/**
 * Class BaseService
 * 基础服务层
 * 基础服务层.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class BaseService
{

    use VerifyTrait, SmsTrait, RedisTrait;

    protected $baseRepository;

    public function __construct(BaseRepository $baseRepository)
    {
        $this->baseRepository = $baseRepository;
    }

    public function list(array $pageParams, array $with = [], array $where = [], $order = [])
    {
        return $this->baseRepository->list($pageParams, $with, $where, $order);
    }

    public function detail($id)
    {
        return $this->baseRepository->showOrFail($id);
    }

    public function showByWhere(array $where)
    {
        return $this->baseRepository->showByWhere($where);
    }

    public function store($data)
    {
        return $this->baseRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->baseRepository->update($id, $data);
    }

    public function delete($id)
    {
        return $this->baseRepository->delete($id);
    }

    /**
     * 发送短信
     * 发送短信
     * @param $key
     * @param $mobile
     * @return array
     * @throws \Exception
     * @author 王志豪
     */
    public function sendSms($key, $mobile)
    {
        $expire = config('back-system.sms.' . $key . '.expire');
        $code = $this->setCode($key, $expire, $mobile);
        if (config('app.env') === 'production') {
            $template = config('back-system.sms.' . $key . '.message_key');
            $content = $this->smsMessageTemplate($template, [':code' => $code, ':expire' => intval($expire / 60)]);
            event(new SendSms($mobile, $content));
            return [];
        } else {
            return ['code' => $code];
        }
    }

    /**
     * 发送邮件
     * 发送邮件
     * @param $key
     * @param $email
     * @return array
     * @throws \Exception
     * @author 王志豪
     */
    public function sendEmail($key, $email)
    {
        $expire = config('back-system.email.' . $key . '.expire');
        $code = $this->setCode($key, $expire, $email);
        if (config('app.env') === 'production') {
            $template = config('back-system.email.' . $key . '.template');
            $content = new SendCloudTemplate(
                $template,
                [
                    'code' => $code,
                    'expire' => intval($expire / 60),
                ]
            );
            event(new SendEmail($email, $content));
            return [];
        } else {
            return ['code' => $code];
        }
    }

    /**
     * 设置验证码
     * 设置验证码
     * @param $prefix
     * @param $expire
     * @param $key
     * @return int
     * @throws \Exception
     * @author 王志豪
     */
    private function setCode($prefix, $expire, $key)
    {
        $code = random_int(100000, 999999);
        $this->setExValue($prefix . '_' . $key, $expire, $code);
        return $code;
    }

    /**
     * 发送短信模板模板
     * @param $type
     * @param $replace
     * @return mixed
     * @author 王志豪
     */
    private function smsMessageTemplate($type, $replace)
    {
        [$keys, $values] = Arr::divide($replace);
        return str_replace($keys, $values, trans($type));
    }

}
