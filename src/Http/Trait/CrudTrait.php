<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Illuminate\Database\Eloquent\Collection;

/**
 *
 */
trait CrudTrait
{
    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed
    {
        return $this->model->where('uuid', $id)->first();
    }

    /**
     * @param $item
     * @param $column
     * @return mixed
     */
    public function getByColumn($item, $column): mixed
    {
        return $this->model->where($column, $item)->first();
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed
    {
        return $this->model->create($data);
    }

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data): mixed
    {
        return $this->model->where('uuid', $id)->update($data);
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed
    {
        return $this->model->where('uuid', $id)->delete();
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }
}