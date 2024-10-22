<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Contracts\BaseInterface;
use Wasimrasheed\EWallet\Http\Trait\CrudTrait;
use Wasimrasheed\EWallet\Models\PaymentMethod;

readonly class PaymentMethodController implements BaseInterface
{
    use CrudTrait;
    public function __construct(private readonly PaymentMethod $model)
    {
    }

}