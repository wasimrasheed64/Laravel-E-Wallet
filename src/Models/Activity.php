<?php

namespace Wasimrasheed\EWallet\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Activity extends Model
{
    use HasFactory;
    protected $table = 'digital_wallet_activities';
    protected $fillable = [
        'uuid',
        'action',
        'points',
    ];

    // An activity can be linked to many transactions
    public function transactions(): HasMany
    {
        return $this->hasMany(Transaction::class, 'activity', 'uuid');
    }

}
