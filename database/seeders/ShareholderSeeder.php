<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\Shareholder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ShareholderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $company = Company::first();

        Shareholder::create([
            'company_id' => $company->id,
            'name' => 'Founder A',
            'type' => 'founder',
            'ownership_percentage' => 60
        ]);

        Shareholder::create([
            'company_id' => $company->id,
            'name' => 'Investor B',
            'type' => 'investor',
            'ownership_percentage' => 30
        ]);
    }
}
