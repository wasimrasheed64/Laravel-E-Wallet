<?php
namespace Wasimrasheed\EWallet\Http\Controllers;

use Wasimrasheed\EWallet\Contracts\BaseInterface;
use Wasimrasheed\EWallet\Http\Trait\CrudTrait;

/**
 * Class BaseController
 *
 * This class serves as a generic base controller that implements the BaseInterface.
 * It provides common CRUD operations by utilizing the `CrudTrait` and handles
 * model and validation injection via the constructor.
 */
class BaseController implements BaseInterface
{
    // Including the CRUD operations from the CrudTrait
    use CrudTrait;

    /**
     * @var mixed Holds the model instance that will be used for performing CRUD operations.
     */
    private mixed $model;

    /**
     * @var mixed Holds the validation rules or class responsible for validating incoming data.
     */
    private mixed $validation;

    /**
     * BaseController constructor.
     *
     * This constructor accepts a model and validation object,
     * injecting them into the controller for further use.
     *
     * @param mixed $model The model to be used for CRUD operations.
     * @param mixed $validation The validation logic to be applied to the data.
     */
    public function __construct(mixed $model, mixed $validation)
    {
        $this->model = $model;             // Assigns the model to the controller.
        $this->validation = $validation;   // Assigns the validation to the controller.
    }
}
