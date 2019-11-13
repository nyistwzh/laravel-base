<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    protected $table = 'files';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'path', 'size', 'request_ip', 'user_id'];

    /**
     * 设置请求IP
     * 设置请求IP.
     *
     * @author 王志豪
     */
    public function setRequestIpAttribute()
    {
        $this->attributes['request_ip'] = request()->ip();
    }

    /**
     * 管理员
     * 获取指定文件的上传管理员.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     *
     * @author 王志豪
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
