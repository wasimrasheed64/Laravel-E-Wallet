<?php

namespace Wasimrasheed\EWallet\Facade;

use Illuminate\Support\Facades\Facade;

class EWallet extends  Facade
{
    public static function getFacadeAccessor()
    {
        return 'EWallet';
    }
}