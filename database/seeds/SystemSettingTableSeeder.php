<?php

use Illuminate\Database\Seeder;
use App\Repositories\SystemSettingRepository;

class SystemSettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $systemSettingParams = [
            'gpu_available_time' => 10,
            'register' => 200,
            'real_name' => 200,
            'education_info' => 200,
            'position_info' => 200,
            'award_info' => 200,
            'no_login_time' => 12,
            'no_login_deduction_integral' => 2000,
            'no_login_deduction_experience' => 2000,
        ];
        app(SystemSettingRepository::class)->store($systemSettingParams);
    }
}
