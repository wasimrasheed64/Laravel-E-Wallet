<?php

namespace Wasimrasheed\EWallet\Contracts;

interface BaseInterface
{
    public function getById($id);
    public function getByColumn($item, $column);
    public function store(array $data);
    public function update($id, array $data);
    public function delete($id);
}