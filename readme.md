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
   ccomposer require wasimrasheed/e-wallet
   ```

2. Register the service provider in config/app.php if not using auto-discovery:
   ```php
   'providers' => [
       ...
       Wasimrasheed\Ewallet\EwalletServiceProvider::class,
   ]
   ```

3. Publish and run the migrations:
   ```php
   php artisan migrate
   ```


## Usage
Once the package is installed and configured, you can interact with the package's controllers and models. The key classes included are:

1. **WalletController**
   The WalletController is responsible for managing wallet records. It handles operations such as creating a new wallet, updating existing wallets, retrieving wallet details, and deleting wallets.

2. **TransactionController**
   The TransactionController handles operations related to the Transaction model. This includes creating, updating, and deleting transactions, as well as retrieving transaction histories for specific wallets.

3. **PaymentMethodController**
   This controller manages CRUD operations for different payment methods that are linked to wallets. Payment methods can be created, updated, deleted, and listed.

4. **ActivityController**
   The ActivityController tracks all significant activities related to wallets. This could include logging transactions, wallet updates, and other key events.   

## Example Usage
```php 
// Access WalletController
$walletController = app()->make('EWallet');
$wallet = $walletController->create([
    'user_id' => 1,
    'balance' => 1000
]);

// Access TransactionController
$transactionController = app()->make('EWallet')->transactionController;
$transaction = $transactionController->create([
    'wallet_id' => 1,
    'amount' => 200,
    'type' => 'debit'
]);

// Access PaymentMethodController
$paymentMethodController = app()->make('EWallet')->paymentMethodController;
$paymentMethod = $paymentMethodController->create([
    'wallet_id' => 1,
    'method' => 'credit_card'
]);

// Access ActivityController
$activityController = app()->make('EWallet')->activityController;
$activity = $activityController->create([
    'wallet_id' => 1,
    'description' => 'Transaction created'
]);
```

## Customization
You can extend or modify the default behavior by extending the base classes provided in the package or by overriding specific methods as per your application's requirements.

## Migrations
This package provides its own set of migrations, located in database/migrations, which are automatically loaded when you run php artisan migrate. Ensure that migrations are properly configured to avoid any issues.

## Contributing
Feel free to contribute to this package by submitting a pull request or opening an issue on GitHub. Contributions are highly appreciated!

## License
This package is open-source and is distributed under the MIT License.

