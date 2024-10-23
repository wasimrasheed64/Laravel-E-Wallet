<?php

namespace Wasimrasheed\EWallet;

use Wasimrasheed\EWallet\Http\Controllers\ActivityController;
use Wasimrasheed\EWallet\Http\Controllers\PaymentMethodController;
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;
use Wasimrasheed\EWallet\Http\Controllers\WalletController;
use Wasimrasheed\EWallet\Http\Trait\CreateActivityTrait;
use Wasimrasheed\EWallet\Http\Trait\CreatePaymentValidationTrait;
use Wasimrasheed\EWallet\Http\Trait\CreateTransactionTrait;
use Wasimrasheed\EWallet\Http\Trait\CreateWalletTrait;
use Wasimrasheed\EWallet\Validations\ActivityValidations;
use Wasimrasheed\EWallet\Validations\PaymentMethodValidations;
use Wasimrasheed\EWallet\Validations\TransactionValidations;
use Wasimrasheed\EWallet\Validations\WalletValidations;

class EWallet
{
    use CreateWalletTrait, CreateActivityTrait, CreateTransactionTrait, CreatePaymentValidationTrait;

    public function __construct(WalletController        $walletController, WalletValidations $walletValidations,
                                ActivityController      $activityController, ActivityValidations $activityValidations,
                                TransactionController   $transactionController, TransactionValidations $transactionValidations,
                                PaymentMethodController $paymentMethodController, PaymentMethodValidations $paymentMethodValidations
    )
    {
        // Call constructors from each trait if they have one.
        $this->initCreateWalletTrait($walletController, $walletValidations);
        $this->initCreateActivityTrait($activityController, $activityValidations);
        $this->initCreateTransactionTrait($transactionController, $transactionValidations);
        $this->initCreatePaymentValidationTrait($paymentMethodController, $paymentMethodValidations);
    }


}