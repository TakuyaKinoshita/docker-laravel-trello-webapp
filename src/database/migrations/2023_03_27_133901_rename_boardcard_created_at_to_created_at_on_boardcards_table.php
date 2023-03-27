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
        Schema::table('boardcards', function (Blueprint $table) {
            $table->renameColumn('boardcard_created_at', 'created_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boardcards', function (Blueprint $table) {
            $table->renameColumn('created_at', 'boardcard_created_at');
        });
    }
};
