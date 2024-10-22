<?php

namespace Wasimrasheed\EWallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    use HasFactory;
    protected $fillable = [
        'uuid',
        'wallet_id',
        'user_id',
        'amount',
        'cashflowIn',
        'cashType',
        'transaction_type',
        'payment_method',
        'activity',
        'status',
        'notes',
    ];

    // A transaction belongs to a wallet
    public function wallet(): BelongsTo
    {
        return $this->belongsTo(Wallet::class, 'wallet_id', 'uuid');
    }


    // A transaction is associated with an activity
    public function activity(): BelongsTo
    {
        return $this->belongsTo(Activity::class, 'activity', 'uuid');
    }
}
