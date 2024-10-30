<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('digital_wallet_transactions', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('wallet_id');
            $table->uuid('user_id');
            $table->decimal('amount', 15, 2);
            $table->boolean('cashflowIn');
            $table->string('cashType');
            $table->string('transaction_type');
            $table->string('payment_method');
            $table->uuid('activity');
            $table->string('external_transaction_id');
            $table->boolean('status')->default(false);
            $table->longText('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
