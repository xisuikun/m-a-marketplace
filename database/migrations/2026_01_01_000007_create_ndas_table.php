<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ndas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('deal_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // The Buyer
            $table->enum('status', ['pending', 'signed', 'rejected'])->default('pending');
            $table->timestamp('signed_at')->nullable();
            $table->string('file_path')->nullable(); // Signed document path
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ndas');
    }
};
