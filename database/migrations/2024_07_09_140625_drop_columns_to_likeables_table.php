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
        Schema::table('likeables', function (Blueprint $table) {
            $table->dropColumn('post_id');
            $table->dropColumn('video_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likeables', function (Blueprint $table) {
            $table->integer('post_id');
            $table->integer('video_id');
        });
    }
};
