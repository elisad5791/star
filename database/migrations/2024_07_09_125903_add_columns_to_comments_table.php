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
        Schema::table('comments', function (Blueprint $table) {
            $table->string('content');
            $table->integer('status')->default(0);
            $table->integer('user_id');
            $table->integer('post_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('comments', function (Blueprint $table) {
            $table->dropColumn('content');
            $table->dropColumn('status');
            $table->dropColumn('user_id');
            $table->dropColumn('post_id');
        });
    }
};
