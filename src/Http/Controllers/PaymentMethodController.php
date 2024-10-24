<?php

namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Models\PaymentMethod;
use Wasimrasheed\EWallet\Validations\PaymentMethodValidations;

/**
 * Class PaymentMethodController
 *
 * This controller manages all operations related to the `PaymentMethod` model,
 * including creating, updating, retrieving, and deleting payment methods.
 * It extends the `BaseController` to reuse the CRUD functionalities.
 */
class PaymentMethodController extends BaseController
{
    /**
     * PaymentMethodController constructor.
     *
     * Initializes the controller by passing the `PaymentMethod` model and
     * the `PaymentMethodValidations` validation class to the parent `BaseController`.
     *
     * @param PaymentMethod $model The PaymentMethod model instance used for database operations.
     * @param PaymentMethodValidations $validations The validation logic specific to Payment Method operations.
     */
    public function __construct(PaymentMethod $model, PaymentMethodValidations $validations)
    {
        // Call the parent constructor to initialize model and validation
        parent::__construct($model, $validations);
    }
}
