<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Contracts\BaseInterface;
use Wasimrasheed\EWallet\Http\Trait\CrudTrait;

class BaseController implements BaseInterface
{
    use CrudTrait;
    private $model;


    public function __construct($model)
    {
        $this->model = $model;
    }
}