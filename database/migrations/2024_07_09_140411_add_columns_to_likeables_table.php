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
            $table->unsignedBigInteger('profile_id');
            $table->morphs('likeable');
            $table->integer('post_id');
            $table->integer('video_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likeables', function (Blueprint $table) {
            $table->dropColumn('profile_id');
            $table->dropMorphs('likeable');
            $table->dropColumn('post_id');
            $table->dropColumn('video_id');
        });
    }
};
