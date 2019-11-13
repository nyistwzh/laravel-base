<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Transformers\User;

use App\Models\User;
use League\Fractal\TransformerAbstract;

/**
 * Class ShowTransformer
 * 用户详情
 * 过滤并返回管理员详情.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class ShowTransformer extends TransformerAbstract
{
    public function transform(User $user)
    {
        return [
            'id'         => $user->id,
            'username'   => $user->username,
            'avatar'   => $user->avatar,
            'level'     => $user->level,
            'integral'     => $user->integral,
            'created_at' => datetimeString($user->created_at),
            'updated_at' => datetimeString($user->updated_at),
        ];
    }
}
