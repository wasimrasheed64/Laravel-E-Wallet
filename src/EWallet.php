<?php
namespace Wasimrasheed\EWallet;

use Wasimrasheed\EWallet\Http\Controllers\ActivityController;
use Wasimrasheed\EWallet\Http\Controllers\PaymentMethodController;
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;
use Wasimrasheed\EWallet\Http\Controllers\WalletController;
use Wasimrasheed\EWallet\Http\Trait\ActivityTrait;
use Wasimrasheed\EWallet\Http\Trait\PaymentTrait;
use Wasimrasheed\EWallet\Http\Trait\TransactionTrait;
use Wasimrasheed\EWallet\Http\Trait\WalletTrait;
use Wasimrasheed\EWallet\Models\Activity;
use Wasimrasheed\EWallet\Models\PaymentMethod;
use Wasimrasheed\EWallet\Models\Transaction;
use Wasimrasheed\EWallet\Models\Wallet;
use Wasimrasheed\EWallet\Validations\ActivityValidations;
use Wasimrasheed\EWallet\Validations\PaymentMethodValidations;
use Wasimrasheed\EWallet\Validations\TransactionValidations;
use Wasimrasheed\EWallet\Validations\WalletValidations;

/**
 * Class EWallet
 *
 * This class serves as the main entry point for managing an e-wallet system.
 * It uses traits to handle the creation of wallets, activities, transactions, and payment methods.
 * It also interacts with various controllers to manage the core business logic of the wallet operations.
 */
class EWallet
{
    // Including traits for wallet, activity, transaction, and payment validation-related operations.
    use WalletTrait, ActivityTrait, TransactionTrait, PaymentTrait;

    /**
     * @var WalletController
     * Holds the instance of WalletController, responsible for handling wallet-related operations.
     */
    private WalletController $walletController;

    /**
     * @var TransactionController
     * Holds the instance of TransactionController, responsible for managing transactions within the wallet system.
     */
    private TransactionController $transactionController;

    /**
     * @var ActivityController
     * Holds the instance of ActivityController, used to manage wallet activities like transactions, deposits, or withdrawals.
     */
    private ActivityController $activityController;

    /**
     * @var PaymentMethodController
     * Holds the instance of PaymentMethodController, responsible for handling operations related to payment methods.
     */
    private PaymentMethodController $paymentMethodController;

    /**
     * EWallet constructor.
     *
     * Initializes the EWallet class by creating new instances of all necessary controllers.
     * Each controller is injected with the appropriate model and its corresponding validation class.
     */
    public function __construct()
    {
        // Initializing the WalletController with Wallet model and validation logic.
        $this->walletController = new WalletController(new Wallet(), new WalletValidations());

        // Initializing the TransactionController to handle transactions, passing Transaction model and validations.
        $this->transactionController = new TransactionController(new Transaction(), new TransactionValidations());

        // Initializing the ActivityController with Activity model and corresponding validation rules.
        $this->activityController = new ActivityController(new Activity(), new ActivityValidations());

        // Initializing the PaymentMethodController with PaymentMethod model and its validations.
        $this->paymentMethodController = new PaymentMethodController(new PaymentMethod(), new PaymentMethodValidations());
    }
}
