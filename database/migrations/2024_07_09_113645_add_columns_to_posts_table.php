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
        Schema::table('posts', function (Blueprint $table) {
            $table->string('title')->unique();
            $table->string('slug');
            $table->string('content');
            $table->integer('views')->default(0);
            $table->boolean('is_commentable')->default(true);
            $table->integer('user_id');
            $table->integer('profile_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->dropColumn('title');
            $table->dropColumn('slug');
            $table->dropColumn('content');
            $table->dropColumn('views');
            $table->dropColumn('is_commentable');
            $table->dropColumn('user_id');
            $table->dropColumn('profile_id');
        });
    }
};
