<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->enum('role', ['admin', 'buyer', 'seller', 'advisor'])->default('buyer');
            
            // KYC Fields
            $table->boolean('is_verified')->default(false);
            $table->string('passport_id')->nullable();
            $table->timestamp('face_verified_at')->nullable();
            $table->string('linkedin_url')->nullable();
            $table->string('country')->nullable();
            
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
