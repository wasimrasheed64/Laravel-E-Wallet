<?php

namespace Wasimrasheed\EWallet\Http\Controllers;
use Wasimrasheed\EWallet\Models\Transaction;

class TransactionController  extends BaseController
{
    public function __construct(Transaction $model)
    {
        parent::__construct($model);
    }
}
