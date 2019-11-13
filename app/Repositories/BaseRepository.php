<?php

/*
 * What php team is that is 'one thing, a team, work together'
 */

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

class BaseRepository
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function show(int $id)
    {
        return $this->model->find($id);
    }

    public function showOrFail(int $id)
    {
        return $this->model->findOrFail($id);
    }

    public function showByWhere(array $where)
    {
        return $this->model->where($where)->first();
    }

    public function showByWhereOrFail(array $where, int $id)
    {
        return $this->model->where($where)->findOrFail($id);
    }

    public function batchInsert(array $data, $where = [])
    {
        if ($where) {
            $this->deleteByWhere($where);
        }

        return $this->model->insert($data);
    }

    public function list(array $pageParams, array $with = [], array $where = [], $order = [])
    {
        $perPage     = $pageParams['per_page'] ?? '';
        $q           = $pageParams['q']        ?? '';

        return $this->model
            ->when($q, function ($query) use ($q) {
                return $query->where(function ($query) use ($q) {
                    $where = true;
                    foreach ($q as $k => $v) {
                        if (strpos($k, '.') !== false) {
                            if ($where) {
                                $action = 'where';
                                $where = false;
                            } else {
                                $action = 'orWhere';
                            }
                            $query = $query->{$action}($k, 'like', '%' . $v . '%');
                        } else {
                            if ($where) {
                                $action = 'whereHas';
                                $where = false;
                            } else {
                                $action = 'orWhereHas';
                            }
                            list($association, $key) = explode('.', $k);
                            $query = $query->{$action}($association, function ($query) use ($key, $v) {
                                $query->where($key, 'like', '%' . $v . '%');
                            });
                        }
                    }

                    return $query;
                });
            })
            ->when(count($with), function ($query) use ($with) {
                return $query->with($with);
            })
            ->when(count($where), function ($query) use ($where) {
                foreach ($where as $k => $v) {
                    if (strpos($k, '.') !== false) {
                        if (is_array($v)) {
                            $query = $query->whereIn($k, $v);
                        } else {
                            $query = $query->where($k, $v);
                        }
                    } else {
                        list($association, $key) = explode('.', $k);
                        $query = $query->whereHas($association, function ($query) use ($key, $v) {
                            $query->where($key, $v);
                        });
                    }
                }
                return $query;
            })
            ->when(count($order), function ($query) use ($order) {
                foreach ($order as $k => $v) {
                    $query = $query->orderBy($k, $v);
                }
                return $query;
            })
            ->when($perPage, function ($query) use ($perPage) {
                return $query->paginate($perPage);
            }, function ($query) {
                return $query->get();
            });
    }

    public function store($data)
    {
        $model = $this->model;
        $model->fill($data);
        $model->save();

        return $this->show($model->id);
    }

    public function update($id, $data)
    {
        $model = $this->show($id);
        foreach ($data as $k => $v) {
            $model->{$k} = $v;
        }
        $model->save();

        return $this->show($model->id);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function deleteByWhere($where)
    {
        return $this->model->where($where)->delete();
    }
}
