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
        Schema::create('card', function (Blueprint $table) {
            $table->bigIncrements('card_id');
            $table->unsignedBigInteger('list_id');
            $table->foreign('list_id')->references('list_id')->on('list');
            $table->char('card_name', 45)->nullable(false);
            $table->tinyInteger('card_order')->nullable(false);
            $table->boolean('card_archive')->default(false);
            $table->timestampTz('card_created_at',0)->nullable(false);
            $table->timestampTz('card_updated_at',0)->nullable(false);
            $table->json('card_options')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card');
    }
};
