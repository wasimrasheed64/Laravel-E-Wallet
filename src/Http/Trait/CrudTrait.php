<?php

namespace Wasimrasheed\EWallet\Http\Trait;

trait CrudTrait
{
    public function getById($id)
    {
        return $this->model->where('uuid', $id)->first();
    }

    public function getByColumn($item, $column)
    {
        return $this->model->where($column, $item)->first();
    }

    public function store(array $data)
    {
        $record = $this->getById($id);
        return $record->update($data);
    }

    public function update($id, array $data)
    {
        return $this->model->where('uuid', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->where('uuid', $id)->delete();
    }
}