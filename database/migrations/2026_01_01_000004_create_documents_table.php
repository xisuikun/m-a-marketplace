<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->morphs('documentable'); // Can be linked to Company or Deal
            $table->string('title');
            $table->string('file_path');
            $table->string('file_type');
            $table->bigInteger('file_size');
            $table->boolean('is_private')->default(true); // Private for Data Room
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
