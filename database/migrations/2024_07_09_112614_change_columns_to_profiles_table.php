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
        Schema::table('profiles', function (Blueprint $table) {
            $table->unsignedInteger('age')->nullable()->change();
            $table->unsignedTinyInteger('status')->default(0)->change();
            $table->dropColumn('user_id');
            $table->dropColumn('author_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->integer('age')->nullable()->change();
            $table->integer('status')->default(0)->change();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
        });
    }
};
