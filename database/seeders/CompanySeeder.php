<?php

namespace Database\Seeders;

use App\Models\Company;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seller = User::where('role', 'seller')->first();

        Company::create([
            'user_id' => $seller->id,
            'name' => 'Startup VN',
            'industry' => 'Tech',
            'location' => 'HCM'
        ]);
    }
}
