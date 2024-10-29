<?php

namespace Wasimrasheed\EWallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PaymentMethod extends Model
{
    use HasFactory;
    protected  $table = 'wallet_payment_methods';
    protected $primaryKey = 'uuid';
    protected $fillable = [
        'uuid',
        'user_id',
        'wallet_id',
        'last_four_digit',
        'expiry',
        'json',
        'encrypted_card',
        'status',
    ];

    // A payment method belongs to a wallet
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'uuid');
    }

}
