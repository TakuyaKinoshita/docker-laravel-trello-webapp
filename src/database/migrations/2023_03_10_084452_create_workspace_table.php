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
        Schema::create('workspace', function (Blueprint $table) {
            $table->bigIncrements('workspace_id');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->char('workspace_name', 45)->nullable(false);
            $table->timestampTz('workspace_created_at', 0)->nullable(false);
            $table->timestampTz('workspace_updated_at', 0)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('workspace');
    }
};
