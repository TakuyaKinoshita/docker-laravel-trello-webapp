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
        Schema::create('boardcards', function (Blueprint $table) {
            $table->bigIncrements('boardcard_id');
            $table->unsignedBigInteger('boardlist_id');
            $table->foreign('boardlist_id')->references('boardlist_id')->on('boardlists');
            $table->char('boardcard_name', 45)->nullable(false);
            $table->tinyInteger('boardcard_order')->nullable(false);
            $table->boolean('boardcard_archive')->default(false);
            $table->timestampTz('boardcard_created_at',0)->nullable(false);
            $table->timestampTz('boardcard_updated_at',0)->nullable(false);
            $table->json('boardcard_options')->nullable(true);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boardcards');
    }
};
