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
        Schema::create('board', function (Blueprint $table) {
            $table->bigIncrements('board_id');
            $table->unsignedBigInteger('workspace_id');
            $table->foreign('workspace_id')->references('workspace_id')->on('workspace');
            $table->char('board_name', 45)->nullable(false);
            $table->timestampTz('board_created_at',0)->nullable(false);
            $table->timestampTz('board_updated_at',0)->nullable(false);
            $table->json('board_custom_field')->nullable(true);
            $table->json('board_label')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('board');
    }
};
