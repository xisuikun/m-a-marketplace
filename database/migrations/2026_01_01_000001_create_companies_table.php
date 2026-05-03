<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Seller
            $table->string('name');
            $table->string('industry');
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            
            $table->string('registration_number')->nullable();
            $table->boolean('is_public')->default(true);
            $table->string('location')->nullable();
            $table->json('social_links')->nullable(); // LinkedIn, etc
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
