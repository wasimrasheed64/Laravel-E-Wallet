<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Contracts\BaseInterface;
use Wasimrasheed\EWallet\Models\Activity;

class ActivityController extends BaseController
{
    public function __construct(Activity $model)
    {
        parent::__construct($model);
    }
}