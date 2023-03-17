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
        Schema::create('list', function (Blueprint $table) {
            $table->bigIncrements('list_id');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('board_id')->on('board');
            $table->char('list_name', 45)->nullable(false);
            $table->tinyInteger('list_order')->nullable(false);
            $table->timestampTz('list_created_at',0)->nullable(false);
            $table->timestampTz('list_updated_at',0)->nullable(false);
            $table->boolean('list_archive')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('list');
    }
};
