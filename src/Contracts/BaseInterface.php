<?php

namespace Wasimrasheed\EWallet\Contracts;

/**
 *
 */
interface BaseInterface
{
    /**
     * @return mixed
     */
    public function getAll(): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function getById($id): mixed;

    /**
     * @param $item
     * @param $column
     * @return mixed
     */
    public function getByColumn($item, $column): mixed;

    /**
     * @param array $data
     * @return mixed
     */
    public function store(array $data): mixed;

    /**
     * @param $id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data): mixed;

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id): mixed;
}