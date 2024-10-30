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
        Schema::create('digital_wallets', function (Blueprint $table) {
            $table->uuid('uuid')->primary();
            $table->uuid('user_id');
            $table->string('phone_number');
            $table->boolean('is_verified')->default(false);
            $table->boolean('status')->default(false);
            $table->decimal('balance', 15, 2)->default(0);
            $table->decimal('balance_calculator', 15, 2)->default(0);
            $table->longText('balance_hash');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('digital_wallets');
    }
};
