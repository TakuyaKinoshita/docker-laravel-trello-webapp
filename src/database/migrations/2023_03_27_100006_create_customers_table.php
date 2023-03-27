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
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('customer_id');
            $table->char('customer_user_id', 20)->nullable(false);
            $table->char('customer_email', 40)->nullable(false);
            $table->char('customer_hash', 60)->nullable(false);
            $table->timestampTz('customer_created_at', 0)->nullable(false);
            $table->timestampTz('customer_updated_at', 0)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customers');
    }
};
