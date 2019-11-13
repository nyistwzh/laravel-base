<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model
{
    protected $table = 'system_settings';

    protected $fillable = [
        'minute', 'register', 'real_name', 'education_info', 'position_info', 'award_info', 'no_login_time', 'no_login_deduction_integral', 'no_login_deduction_experience'
    ];
}
