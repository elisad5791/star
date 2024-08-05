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
        Schema::table('videos', function (Blueprint $table) {
            $table->text('title');
            $table->text('url');
            $table->unsignedBigInteger('profile_id');
            $table->unsignedBigInteger('category_id');
            $table->integer('author_id');
            $table->integer('likes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('url');
            $table->dropColumn('profile_id');
            $table->dropColumn('category_id');
            $table->dropColumn('author_id');
            $table->dropColumn('likes');
        });
    }
};
