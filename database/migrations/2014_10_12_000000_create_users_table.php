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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('username');
            $table->string('title')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('image')->default('profile.jpg');
            $table->tinyInteger('is_admin')->default(0);
            $table->tinyInteger('is_active')->default(1);
            $table->tinyInteger('profile')->default(1);
            $table->string('city')->nullable();
            $table->string('country')->nullable();
            $table->string('language')->default('en');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
