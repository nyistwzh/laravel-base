<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

use App\Exceptions\CustomException;
use Illuminate\Support\Collection;

if (!function_exists('customError')) {
    /**
     * 自定义错误抛出
     * 自定义错误抛出
     * @param $message
     * @param  int  $code
     * @throws CustomException
     * @author 王志豪
     */
    function customError($message, $code = 500)
    {
        throw new CustomException($message, $code);
    }
}

if (!function_exists('datetimeString')) {
    /**
     * 获取标准时间
     * 获取标准时间
     * @param  null  $datetime
     * @return mixed
     * @author 王志豪
     */
    function datetimeString($datetime = null)
    {
        return $datetime ? $datetime->toDateTimeString() : now()->toDateTimeString();
    }
}

if (!function_exists('filterFieldByOne')) {
    /**
     * 过滤字段（关系：一对一）
     * 过滤字段（关系：一对一）
     * @param Collection $collection
     * @param $column
     * @param $callback = null
     * @return string
     * @author 王志豪
     */
    function filterFieldByOne(Collection $collection, $column, $callback = null)
    {
        if (!$collection) {
            return '';
        }

        if (is_array($column)) {
            $data = $collection->only($column);
            if (in_array('created_at', $column)) {
                $data['created_at'] = datetimeString($data['created_at']);
            }
            if (in_array('updated_at', $column)) {
                $data['updated_at'] = datetimeString($data['updated_at']);
            }
        } else {
            return $collection->{$column};
        }

        if ($column == 'created_at' || $column == 'updated_at') {
            $data = datetimeString($collection->{$column});
        }

        if ($callback) {
            array_walk($callback, function ($value, $key) use ($data) {
                $data[$key] = $value($data[$key]);
            });
        }

        return $data;
    }
}

if (!function_exists('filterFieldByMany')) {
    /**
     * 过滤字段（关系：一对多）
     * 过滤字段（关系：一对多）
     * @param  Collection  $collection
     * @param  array $column
     * @param  null  $callback
     * @return array
     * @author 王志豪
     */
    function filterFieldByMany(Collection $collection, array $column, $callback = null)
    {
        if (!$collection->count()) {
            return [];
        }

        return $collection->map(function (Collection $item) use ($column, $callback) {
            $data = $item->only($column);
            if (in_array('created_at', $column)) {
                $data['created_at'] = datetimeString($data['created_at']);
            }
            if (in_array('updated_at', $column)) {
                $data['updated_at'] = datetimeString($data['updated_at']);
            }
            if ($callback) {
                array_walk($callback, function ($value, $key) use ($data) {
                    $data[$key] = $value($data[$key]);
                });
            }
            return $data;
        })->toArray();
    }
}

if (!function_exists('handleRelationData')) {
    /**
     * 处理一对多的关联数据
     * 处理一对多的关联数据
     * @param $array
     * @param $column
     * @return array
     * @author 王志豪
     */
    function handleRelationData($array, $column)
    {
        if (!count($array)) {
            return [];
        }

        return array_map(function ($item) use ($column) {
            return [$column => $item];
        }, $array);
    }
}
