<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Models\Activity;
use Wasimrasheed\EWallet\Validations\ActivityValidations;

class ActivityController extends BaseController
{
    public function __construct(Activity $model,ActivityValidations $validations)
    {
        parent::__construct($model,$validations);
    }
}