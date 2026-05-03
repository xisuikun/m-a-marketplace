<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Company;
use App\Models\Deal;
use Illuminate\Database\Seeder;

class MarketplaceSeeder extends Seeder
{
    public function run(): void
    {
        $seller = User::where('role', 'seller')->first();

        // Tạo Công ty mẫu
        $company = Company::create([
            'user_id' => $seller->id,
            'name' => 'TechNova Solutions',
            'industry' => 'Software as a Service (SaaS)',
            'description' => 'Một nền tảng quản lý nhân sự dựa trên đám mây với hơn 500 khách hàng doanh nghiệp.',
            'website' => 'https://technova.io',
            'registration_number' => 'VN-12345678',
        ]);

        // Tạo Deal (Thương vụ) mẫu
        Deal::create([
            'company_id' => $company->id,
            'title' => 'Bán 100% cổ phần TechNova Solutions',
            'teaser' => 'Cơ hội sở hữu nền tảng SaaS đang tăng trưởng 40% mỗi năm. Hệ thống ổn định, đội ngũ nhân sự tốt.',
            'asking_price' => 5000000, // 5 triệu USD
            'revenue_annual' => 1200000,
            'ebitda' => 450000,
            'status' => 'active',
            'is_confidential' => false,
        ]);

        // Deal thứ 2 (Bí mật)
        $company2 = Company::create([
            'user_id' => $seller->id,
            'name' => 'Green Logistics Co.',
            'industry' => 'Logistics & Supply Chain',
            'description' => 'Đơn vị vận tải hàng đầu khu vực miền Nam với hạm đội 50 xe tải điện.',
        ]);

        Deal::create([
            'company_id' => $company2->id,
            'title' => 'Dự án Project Emerald - Logistics M&A',
            'teaser' => 'Thoái vốn chiến lược khỏi mảng vận tải xanh. Đã có giấy phép hoạt động cảng biển.',
            'asking_price' => 12000000,
            'revenue_annual' => 8000000,
            'ebitda' => 1500000,
            'status' => 'active',
            'is_confidential' => true,
        ]);
    }
}
