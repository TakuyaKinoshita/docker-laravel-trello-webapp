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
            $table->renameColumn('boardcard_updated_at', 'updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('boardcards', function (Blueprint $table) {
            $table->renameColumn('updated_at', 'boardcard_updated_at');
        });
    }
};
