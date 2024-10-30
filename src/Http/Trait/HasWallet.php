<?php

namespace Wasimrasheed\EWallet\Http\Trait;

use Illuminate\Support\Facades\Hash;
use Wasimrasheed\EWallet\Models\PaymentMethod;
use Wasimrasheed\EWallet\Models\Transaction;
use Wasimrasheed\EWallet\Models\Wallet;

/**
 * Trait HasWallet
 *
 * Provides relationship and helper methods for wallet, transactions, and payment methods.
 * @method hasOne(string $class, string $string, string $string1)
 * @method hasMany(string $class, string $string, string $string1)
 */
trait HasWallet
{
    /**
     * Define a one-to-one relationship with the Wallet model.
     */
    public function wallet(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Wallet::class, 'user_id', 'uuid');
    }

    /**
     * Define a one-to-many relationship with the Transaction model.
     */
    public function transactions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Transaction::class, 'user_id', 'uuid');
    }

    /**
     * Define a one-to-many relationship with the PaymentMethod model.
     */
    public function paymentMethods(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(PaymentMethod::class, 'wallet_id', 'uuid');
    }

    /**
     * Get the wallet balance with null handling.
     */
    public function getWalletBalance(): ?float
    {
        return $this->wallet?->balance ?? 0.0;
    }

    /**
     * Verify the wallet balance hash to ensure data integrity.
     */
    public function verifyWalletBalance(): bool
    {
        if (!$this->wallet) {
            return false;
        }

        $hashedBalance = $this->generateWalletBalanceHash($this->getWalletBalance());
        return Hash::check($hashedBalance, $this->wallet->balance_hash);
    }

    /**
     * Generate a consistent hash of the wallet balance for verification.
     */
    private function generateWalletBalanceHash(float $balance): string
    {
        return hash('sha256', $balance . $this->uuid);
    }

    /**
     * Get the total transaction amount for a specified period.
     */
    public function getTransactionTotal(string $startDate = null, string $endDate = null): float
    {
        $query = $this->transactions();

        if ($startDate) {
            $query->where('created_at', '>=', $startDate);
        }
        if ($endDate) {
            $query->where('created_at', '<=', $endDate);
        }

        return $query->sum('amount');
    }
}
