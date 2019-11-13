<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    protected $table = 'pa_users';

    protected $fillable = [
        'username', 'actual_name', 'province', 'city', 'county', 'is_overseas', 'certificate_type_id', 'id_number', 'avatar', 'email', 'email_verify_at', 'mobile', 'mobile_verify_at', 'password', 'level', 'experience', 'general_integral', 'authenticate_picture', 'authenticate_status', 'authenticate_message', 'last_login_at'
    ];

    protected $hidden = [
        'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims()
    {
        return [];
    }

    /**
     * 密码加密
     * 密码加密.
     *
     * @param $value
     *
     * @author 王志豪
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function getIntegralAttribute()
    {
        return $this->general_integral + $this->dedicated_integral;
    }

    public function getDedicatedIntegralAttribute()
    {
        return $this->dedicatedIntegral()->get()->where('status', 'usable')->sum('surplus_integral');
    }

    public function getGpuAvailableTimeAttribute()
    {
        return $this->dedicated_integral * app(SystemSetting::class)->first()->minute;
    }

    /**
     * 上传文件
     * 获取指定管理员所有上传文件.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     *
     * @author 王志豪
     */
    public function file()
    {
        return $this->hasMany(File::class, 'admin_id', 'id');
    }

}
