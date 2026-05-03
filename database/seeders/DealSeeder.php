<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Deal;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        Deal::create([
            'company_id' => $company->id,
            'title' => 'Sell SaaS Startup',
            'teaser' => 'Fast growth',
            'asking_price' => 500000,
            'revenue_annual' => 200000,
            'ebitda' => 80000,
            'status' => 'active'
        ]);
    }
}
