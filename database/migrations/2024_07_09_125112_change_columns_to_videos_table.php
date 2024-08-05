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
            $table->string('title')->change();
            $table->string('url')->change();
            $table->dropColumn('author_id');
            $table->dropColumn('likes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('videos', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('url')->change();
            $table->integer('author_id');
            $table->integer('likes');
        });
    }
};
