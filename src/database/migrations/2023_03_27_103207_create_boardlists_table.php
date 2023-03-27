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
        Schema::create('boardlists', function (Blueprint $table) {
            $table->bigIncrements('boardlist_id');
            $table->unsignedBigInteger('board_id');
            $table->foreign('board_id')->references('board_id')->on('boards');
            $table->char('boardlist_name', 45)->nullable(false);
            $table->tinyInteger('boardlist_order')->nullable(false);
            $table->timestampTz('boardlist_created_at',0)->nullable(false);
            $table->timestampTz('boardlist_updated_at',0)->nullable(false);
            $table->boolean('boardlist_archive')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boardlists');
    }
};
