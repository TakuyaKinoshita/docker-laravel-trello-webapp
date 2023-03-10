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
        Schema::create('member', function (Blueprint $table) {
            $table->bigIncrements('member_id');
            $table->unsignedBigInteger('workspace_id');
            $table->foreign('workspace_id')->references('workspace_id')->on('workspace');
            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('customer_id')->on('customer');
            $table->boolean('member_status')->nullable(false);
            $table->timestampTz('member_created_at', 0)->nullable(false);
            $table->timestampTz('member_updated_at', 0)->nullable(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('member');
    }
};
