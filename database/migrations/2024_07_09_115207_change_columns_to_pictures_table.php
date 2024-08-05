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
        Schema::table('pictures', function (Blueprint $table) {
            $table->string('title')->change();
            $table->string('url')->change();
            $table->foreign('profile_id')->references('id')->on('profiles');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pictures', function (Blueprint $table) {
            $table->text('title')->change();
            $table->text('url')->change();
            $table->dropForeign(['profile_id']);
            $table->dropForeign(['category_id']);
        });
    }
};
