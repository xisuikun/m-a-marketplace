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
            $table->decimal('net_profit', 15, 2)->nullable();
            $table->decimal('growth_percentage', 5, 2)->nullable();
            
            // Deal info
            $table->enum('deal_type', ['sale_100', 'partial_sale', 'fundraising'])->default('sale_100');
            $table->decimal('valuation', 15, 2)->nullable();
            $table->decimal('equity_offered', 5, 2)->nullable(); // %
            
            // Strategic goals
            $table->text('reason_for_sale')->nullable();
            $table->text('future_plans')->nullable();
            
            $table->string('location')->nullable();
            
            $table->enum('status', ['draft', 'submitted', 'under_review', 'approved', 'published', 'in_negotiation', 'closed'])->default('draft');
            $table->boolean('is_confidential')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('deals');
    }
};
