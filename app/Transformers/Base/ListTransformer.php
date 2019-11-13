<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Transformers\Base;

use Illuminate\Database\Eloquent\Model;
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
class ListTransformer extends TransformerAbstract
{
    public function transform(Model $model)
    {
        return [
            'id'         => $model->id,
            'name'       => $model->name,
            'order'      => $model->order,
            'created_at' => datetimeString($model->created_at),
            'updated_at' => datetimeString($model->updated_at),
        ];
    }
}
