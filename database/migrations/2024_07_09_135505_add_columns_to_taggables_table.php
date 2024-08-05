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
        Schema::table('taggables', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id');
            $table->morphs('taggable');
            $table->integer('post_id');
            $table->integer('picture_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('taggables', function (Blueprint $table) {
            $table->dropColumn('tag_id');
            $table->dropMorphs('taggable');
            $table->dropColumn('post_id');
            $table->dropColumn('picture_id');
        });
    }
};
