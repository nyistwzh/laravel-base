<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Transformers\File;

use App\Models\File;
use League\Fractal\TransformerAbstract;

/**
 * Class ShowTransformer
 * 文件详情
 * 过滤并返回文件详情.
 *
 * @version 1.0.0
 *
 * @author wangzhihao zhihao.wang@extremevision.com.cn
 */
class ShowTransformer extends TransformerAbstract
{
    public function transform(File $file)
    {
        return [
            'name'       => $file->name,
            'type'       => $file->type,
            'path'       => $file->path,
            'size'       => $file->size,
            'request_ip' => $file->request_ip,
            'created_at' => datetimeString($file->created_at),
            'updated_at' => datetimeString($file->updated_at),
        ];
    }
}
