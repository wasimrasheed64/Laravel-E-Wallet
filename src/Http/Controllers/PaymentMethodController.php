<?php

namespace Wasimrasheed\EWallet\Http\Controllers;
use Wasimrasheed\EWallet\Models\PaymentMethod;

class PaymentMethodController extends BaseController
{
    public function __construct(PaymentMethod $model)
{
    parent::__construct($model);
}
}
