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
        Schema::table('task_user', function (Blueprint $table) {
            $table->integer('points')->nullable()->change();
            $table->dropColumn('date_submitted');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {

    }
};
