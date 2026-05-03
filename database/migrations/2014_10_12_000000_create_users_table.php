<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $name) {
            $name->id();
            $name->string('name');
            $name->string('email')->unique();
            $name->timestamp('email_verified_at')->nullable();
            $name->string('password');
            $name->enum('role', ['admin', 'buyer', 'seller'])->default('buyer');
            $name->rememberToken();
            $name->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
