<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Support\Arr;

/**
 * Class UserService
 * 用户
 * 用户增删改查相关操作.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class UserService extends BaseService
{

    public function __construct(UserRepository $userRepository)
    {
        parent::__construct($userRepository);
    }

}
