<?php

namespace Wasimrasheed\EWallet\Http\Controllers;
use Wasimrasheed\EWallet\Models\Wallet;

class WalletController  extends BaseController
{
    public function __construct(Wallet $model)
    {
        parent::__construct($model);
    }
}