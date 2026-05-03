<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('company_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('teaser');
            $table->decimal('asking_price', 15, 2)->nullable();
            $table->decimal('revenue_annual', 15, 2)->nullable();
            $table->decimal('ebitda', 15, 2)->nullable();
            $table->enum('status', ['draft', 'active', 'under_contract', 'sold', 'closed'])->default('draft');
            $table->boolean('is_confidential')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
