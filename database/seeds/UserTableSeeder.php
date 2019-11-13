<?php

use Illuminate\Database\Seeder;
use App\Repositories\UserRepository;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $userParams = [
            'username' => 'a123456',
            'mobile' => '13546522354',
            'password' => 'a123456.'
        ];
        // 实现触发观察期
        app(UserRepository::class)->store($userParams);
    }
}
