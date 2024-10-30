<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Wasimrasheed\EWallet\Exception\WalletException;

/**
 *
 */
trait CrudTrait
{

    /**
     * @param $id
     * @return mixed
     * @throws WalletException
     */
    public function getById($id): mixed
    {
        try {
            return $this->model->where('uuid',$id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $model = strtolower(class_basename($e->getModel()));
            $message = "No instance of {$model} with the given ID found.";
            throw new WalletException($message, $e->getCode());
        } catch (Exception $e) {
            throw new WalletException($e->getMessage(), $e->getCode());
        }
    }


    /**
     * @param $item
     * @param $column
     * @return mixed
     * @throws WalletException
     */
    public function getByColumn($item, $column): mixed
    {
        try {
            return $this->model->where($column, $item)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            $model = strtolower(class_basename($e->getModel()));
            $message = "No instance of {$model} with the given ID found.";
            throw new WalletException($message, $e->getCode());
        } catch (Exception $e) {
            throw new WalletException($e->getMessage(), $e->getCode());
        }
    }


    /**
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function store(array $data): mixed
    {
        try {
            $validatedData = $this->validation->createValidation($data);
            return $this->model->create($validatedData+['uuid' => Str::uuid()]);
        } catch (ValidationException $e) {
            throw new WalletException(json_encode($e->validator->errors()->getMessages()), $e->getCode());
        } catch (Exception $e) {
            throw new WalletException($e->getMessage(), $e->getCode());
        }
    }


    /**
     * @param $id
     * @param array $data
     * @return mixed
     * @throws WalletException
     */
    public function update($id, array $data): mixed
    {
        try {
            $record = $this->model->where('uuid',$id)->firstOrFail();
            $validatedData = $this->validation->updateValidation($data);
            return $record->update($validatedData);
        } catch (ValidationException $e) {
            throw new WalletException(json_encode($e->validator->errors()->getMessages()), $e->getCode());
        } catch (ModelNotFoundException $e) {
            $model = strtolower(class_basename($e->getModel()));
            $message = "No instance of {$model} with the given ID found.";
            throw new WalletException($message, $e->getCode());
        } catch (Exception $e) {
            throw new WalletException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @param $id
     * @return mixed
     * @throws WalletException
     */
    public function delete($id): mixed
    {
        try {
            $record = $this->model->where('uuid',$id)->firstOrFail();
            return $record->delete();
        } catch (ModelNotFoundException $e) {
            $model = strtolower(class_basename($e->getModel()));
            $message = "No instance of {$model} with the given ID found.";
            throw new WalletException($message, $e->getCode());
        } catch (Exception $e) {
            throw new WalletException($e->getMessage(), $e->getCode());
        }
    }

    /**
     * @return Collection
     */
    public function getAll(): Collection
    {
        return $this->model->all();
    }

    /**
     * @param int $id
     * @return array
     */
    public function getByUser(int $id): array
    {
        return $this->model->where('user_id', $id)->get()->toArray();
    }


}