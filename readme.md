# EWallet Package

## Overview

The **EWallet** package is a flexible and modular Laravel package that provides essential functionality for managing wallets, transactions, payment methods, and activities. The package includes various controllers, models, and validation layers to ensure robust data handling and secure operations.

## Features

- **Wallet Management**: Create, update, delete, and retrieve wallet information.
- **Transaction Handling**: Manage all operations related to transactions.
- **Payment Method Management**: Support for various payment methods with CRUD operations.
- **Activity Tracking**: Record and manage wallet-related activities.
- **Validation**: Custom validation logic for each resource to ensure data integrity.

## Installation

1. Install the package via composer:
   ```bash
   composer require wasimrasheed/e-wallet
   ```

2. Register the service provider in config/app.php if not using auto-discovery:
   ```php
   'providers' => [
       ...
       Wasimrasheed\Ewallet\EwalletServiceProvider::class,
   ]
   
    'aliases' => [
         ...
         'EWallet' => Wasimrasheed\Ewallet\Facades\EWallet::class,
    ]
   ```

3. Publish and run the migrations:
   ```php
   php artisan migrate
   ```


## Usage
Once the package is installed and configured, you can interact with the package's controllers and models. The key classes included are:

## WalletController
The WalletController is responsible for managing wallet records. It handles operations such as creating a new wallet, updating existing wallets, retrieving wallet details, and deleting wallets. The key functions include:

```php
createWallet(array $data): mixed:  Creates a new wallet with the provided data.
getWallet(int $id): array:  Retrieves the details of a specific wallet by its ID.
getWallets(): Collection:  Retrieves a collection of all wallets.
updateWallet(int $id, array $data): string:  Updates the wallet details for the specified wallet ID.
deleteWallet(int $id): string:  Deletes a wallet identified by its ID.
getWalletByColumn($item, $column): array:  Retrieves a wallet based on a specific column value.
```

### Wallet Validation Rules

**`createValidationRules`:**

- **`user_id`**: `required|integer|exists:users,id`  
  Must be a valid user ID that exists in the users table.

- **`phone_number`**: `required|string|size:11`  
  You may adjust the size if your phone numbers differ in length.

- **`is_verified`**: `required|boolean`  
  Ensures it is either true or false.

- **`balance`**: `required|numeric|min:0`  
  Must be a non-negative numeric value.

- **`balance_calculator`**: `required|numeric|min:0`  
  Must be a non-negative numeric value.

- **`balance_hash`**: `required|string`  
  Must be a string value.

- **`status`**: `required|boolean`  
  Ensures it is either true or false.

---

**`updateValidationRules`:**

- **`phone_number`**: `sometimes|string|size:11`  
  You may adjust the size if your phone numbers differ in length.

- **`balance`**: `sometimes|numeric|min:0`  
  Must be a non-negative numeric value.

- **`balance_calculator`**: `sometimes|numeric|min:0`  
  Must be a non-negative numeric value.

- **`balance_hash`**: `required|string`  
  Must be a string value.

```php

$newWallet = EWallet::createWallet([
    'user_id' => $uuid,
    'balance' => 100.00,
]);

// Retrieve wallet details
$walletDetails = EWallet::getWallet($uuid);

// Retrieve all wallets
$allWallets = EWallet::getWallets();

// Update wallet
$updateMessage = EWallet::updateWallet($uuid, ['balance' => 150.00]);

// Delete wallet
$deleteMessage = EWallet::deleteWallet(1);
```
### TransactionController
   The TransactionController handles operations related to the Transaction model. This includes creating, updating, and deleting transactions, as well as retrieving transaction histories for specific wallets. The key functions include:
```php
createTransaction(array $data): mixed: Creates a new transaction linked to a wallet.
getTransaction(int $id): array: Retrieves the details of a specific transaction by its ID.
getTransactionsByWallet(int $walletId): Collection: Retrieves the transaction history for a specific wallet.
updateTransaction(int $id, array $data): string: Updates the transaction details for the specified transaction ID.
deleteTransaction(int $id): string: Deletes a transaction identified by its ID.
```
### Transaction Validation Rules

**`createTransactionValidationRules`:**

- **`wallet_id`**: `required|uuid|exists:wallets,id`  
  Must be a valid UUID of a wallet that exists in the wallets table.

- **`user_id`**: `required|uuid`  
  Must be a valid UUID for the user associated with the transaction.

- **`amount`**: `required|numeric|min:0`  
  The transaction amount must be a non-negative numeric value.

- **`cashflowIn`**: `required|boolean`  
  Indicates whether the cash flow is incoming (true) or outgoing (false).

- **`cashType`**: `required|in:topUp,loyalty,purchase,purchaseReward,refunded`  
  Specifies the type of cash flow, with the allowed values being topUp, loyalty, purchase, purchaseReward, and refunded.

- **`transaction_type`**: `required|in:easy_paisa,jazzcash,card`  
  Specifies the type of transaction, with valid options being easy_paisa, jazzcash, and card.

- **`payment_method`**: `required|string|max:255`  
  The payment method used for the transaction, must be a string with a maximum length of 255 characters.

- **`external_transaction_id`**: `nullable|string|max:255`  
  Optional field for an external transaction ID, if applicable.

- **`activity`**: `nullable|uuid`  
  Optional UUID linking to an activity related to the transaction.

- **`status`**: `required|boolean`  
  Indicates the transaction status (e.g., completed or pending).

- **`notes`**: `nullable|string`  
  Optional field for any additional notes related to the transaction.

---

**`updateTransactionValidationRules`:**

- **`amount`**: `sometimes|numeric|min:0`  
  The transaction amount, if provided, must be a non-negative numeric value.

- **`cashflowIn`**: `sometimes|boolean`  
  Indicates whether the cash flow is incoming (true) or outgoing (false), if provided.

- **`cashType`**: `sometimes`  
  The type of cash flow, if provided.

- **`transaction_type`**: `sometimes`  
  The type of transaction, if provided.

- **`payment_method`**: `sometimes|string|max:255`  
  The payment method used for the transaction, if provided.

- **`external_transaction_id`**: `sometimes|string|max:255`  
  Optional field for an external transaction ID, if provided.

- **`activity`**: `sometimes|uuid`  
  Optional UUID linking to an activity related to the transaction, if provided.

- **`status`**: `sometimes|boolean`  
  Indicates the transaction status, if provided.

- **`notes`**: `sometimes|string`  
  Optional field for any additional notes related to the transaction, if provided.


**Example Usage of TransactionController**
```php
use Wasimrasheed\EWallet\Http\Controllers\TransactionController;

// Create a new transaction
$newTransaction = EWallet::createTransaction([
'wallet_id' => 1,
'amount' => 50.00,
'type' => 'credit',
]);

// Retrieve transaction details
$transactionDetails = EWallet::getTransaction(1);

// Retrieve all transactions for a wallet
$walletTransactions = EWallet::getTransactionsByWallet(1);

// Update transaction
$transactionUpdateMessage = EWallet::updateTransaction(1, ['amount' => 75.00]);

// Delete transaction
$transactionDeleteMessage = EWallet::deleteTransaction(1);
```

## PaymentMethodController
   This controller manages CRUD operations for different payment methods that are linked to wallets. Payment methods can be created, updated, deleted, and listed. The key functions include:
```php
createPaymentMethod(array $data): mixed: Creates a new payment method.
getPaymentMethod(int $id): array: Retrieves the details of a specific payment method by its ID.
getPaymentMethods(): Collection: Retrieves a collection of all payment methods.
updatePaymentMethod(int $id, array $data): string: Updates the payment method details for the specified ID.
deletePaymentMethod(int $id): string: Deletes a payment method identified by its ID.
```
### Payment Method Validation Rules

**`createPaymentMethodValidationRules`:**

- **`user_id`**: `required|integer|exists:users,id`  
  Must be a valid user ID that exists in the users table.

- **`wallet_id`**: `required|uuid|exists:wallets,uuid`  
  Ensures the wallet_id exists in the wallets table.

- **`last_four_digit`**: `required|string|size:4`  
  Exactly 4 digits for the last four of the card.

- **`expiry`**: `required|string|regex:/^(0[1-9]|1[0-2])\/?([0-9]{2})$/`  
  Validates the expiration date in MM/YY format.

- **`json`**: `nullable|json`  
  Optional field; must be valid JSON if provided.

- **`status`**: `boolean`  
  Indicates the status of the payment method.

- **`encrypted_card`**: `required|string`  
  Encrypted card information is required.

---

**`updatePaymentMethodValidationRules`:**

- **`last_four_digit`**: `sometimes|string|size:4`  
  Exactly 4 digits for the last four of the card; optional for update.

- **`expiry`**: `sometimes|string|regex:/^(0[1-9]|1[0-2])\/?([0-9]{2})$/`  
  Validates the expiration date in MM/YY format; optional for update.

- **`json`**: `nullable|json`  
  Optional field; must be valid JSON if provided.

- **`status`**: `boolean`  
  Indicates the status of the payment method.

- **`encrypted_card`**: `required|string`  
  Encrypted card information is required.



**Example Usage of PaymentMethodController**
```php
use Wasimrasheed\EWallet\Http\Controllers\PaymentMethodController;

// Create a new payment method
$newPaymentMethod = EWallet::createPaymentMethod([
'name' => 'Credit Card',
'details' => 'Visa ending in 1234',
]);

// Retrieve payment method details
$paymentMethodDetails = EWallet::getPaymentMethod(1);

// Retrieve all payment methods
$allPaymentMethods = EWallet::getPaymentMethods();

// Update payment method
$paymentMethodUpdateMessage = EWallet::updatePaymentMethod(1, ['details' => 'Updated details']);

// Delete payment method
$paymentMethodDeleteMessage = EWallet::deletePaymentMethod(1);
```
## ActivityController
   The ActivityController tracks all significant activities related to wallets. This could include logging transactions, wallet updates, and other key events. The key functions include:
```php
createActivity(array $data): mixed: Logs a new activity related to wallets.
getActivity(int $id): array: Retrieves the details of a specific activity by its ID.
getActivities(): Collection: Retrieves a collection of all recorded activities.
updateActivity(int $id, array $data): string: Updates the details of a specific activity.
deleteActivity(int $id): string: Deletes an activity identified by its ID.
```
### Activity Validation Rules

**`createActivityValidationRules`:**

- **`action`**: `required|string|max:500`  
  The action field is required, must be a string, and can have a maximum length of 500 characters.

- **`points`**: `required|numeric|min:0`  
  The points field is required, must be numeric, and should be a non-negative value (minimum: 0).

---


**`updateActivityValidationRules`:**

- **`action`**: `sometimes|string|max:500`  
  The action field is optional; if provided, it must be a string and can have a maximum length of 500 characters.

- **`points`**: `sometimes|numeric|min:0`  
  The points field is optional; if provided, it must be numeric and should be a non-negative value (minimum: 0).


 **Example Usage of ActivityController**

```php
use Wasimrasheed\EWallet\Http\Controllers\ActivityController;

// Create a new activity
$activityController = new ActivityController();
$newActivity = EWallet::createActivity([
'wallet_id' => 1,
'description' => 'Deposit of $50',
]);

// Retrieve activity details
$activityDetails = EWallet::etActivity(1);

// Retrieve all activities
$allActivities = EWallet::getActivities();

// Update activity
$activityUpdateMessage = EWallet::updateActivity(1, ['description' => 'Updated description']);

// Delete activity
$activityDeleteMessage = EWallet::deleteActivity(1);
```



## Customization
You can extend or modify the default behavior by extending the base classes provided in the package or by overriding specific methods as per your application's requirements.

## Migrations
This package provides its own set of migrations, located in database/migrations, which are automatically loaded when you run php artisan migrate. Ensure that migrations are properly configured to avoid any issues.

## Contributing
Feel free to contribute to this package by submitting a pull request or opening an issue on GitHub. Contributions are highly appreciated!

## License
This package is open-source and is distributed under the MIT License.

