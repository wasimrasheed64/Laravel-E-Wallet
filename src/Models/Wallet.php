<?php

namespace Wasimrasheed\EWallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'uuid',
        'user_id',
        'phone_number',
        'is_verified',
        'balance',
        'balance_calculator',
        'balance_hash',
    ];


    // A wallet has many payment methods
    public function paymentMethods(): HasMany
    {
        return $this->hasMany(PaymentMethod::class, 'wallet_id', 'uuid');
    }

    // A wallet has many transactions
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'wallet_id', 'uuid');
    }
}
