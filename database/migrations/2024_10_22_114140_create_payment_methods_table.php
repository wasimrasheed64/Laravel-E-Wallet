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
        Schema::create('wallet_payment_methods', function (Blueprint $table) {
                $table->uuid('uuid')->primary();
                $table->uuid('user_id');
                $table->uuid('wallet_id');
                $table->string('last_four_digit', 4);
                $table->string('expiry');
                $table->boolean('status')->default(true);
                $table->longText('encrypted_card');
                $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_methods');
    }
};
