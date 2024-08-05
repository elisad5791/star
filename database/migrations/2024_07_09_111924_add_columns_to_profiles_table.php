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
            $table->string('first_name');
            $table->string('second_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('login')->nullable();
            $table->string('phone')->nullable();
            $table->integer('age')->nullable();
            $table->integer('status')->default(0);
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('profiles', function (Blueprint $table) {
            $table->dropColumn('first_name');
            $table->dropColumn('second_name');
            $table->dropColumn('last_name');
            $table->dropColumn('login');
            $table->dropColumn('phone');
            $table->dropColumn('age');
            $table->dropColumn('status');
            $table->dropColumn('user_id');
            $table->dropColumn('author_id');
        });
    }
};
