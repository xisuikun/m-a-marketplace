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
            'is_public' => true,
            'location' => 'Ho Chi Minh City, Vietnam',
        ]);

        // Tạo Deal (Thương vụ) mẫu
        Deal::create([
            'company_id' => $company->id,
            'title' => 'Bán 100% cổ phần TechNova Solutions',
            'teaser' => 'Cơ hội sở hữu nền tảng SaaS đang tăng trưởng 40% mỗi năm. Hệ thống ổn định, đội ngũ nhân sự tốt.',
            'asking_price' => 5000000, // 5 triệu USD
            'revenue_annual' => 1200000,
            'ebitda' => 450000,
            'net_profit' => 300000,
            'growth_percentage' => 40,
            'valuation' => 5000000,
            'equity_offered' => 100,
            'deal_type' => 'sale_100',
            'reason_for_sale' => 'Founder muốn nghỉ hưu và tìm đối tác chiến lược có khả năng scale ra toàn cầu.',
            'future_plans' => 'Mở rộng thị trường sang Đông Nam Á.',
            'location' => 'Ho Chi Minh City, Vietnam',
            'status' => 'published',
            'is_confidential' => false,
        ]);

        // Deal thứ 2 (Bí mật)
        $company2 = Company::create([
            'user_id' => $seller->id,
            'name' => 'Green Logistics Co.',
            'industry' => 'Logistics & Supply Chain',
            'description' => 'Đơn vị vận tải hàng đầu khu vực miền Nam với hạm đội 50 xe tải điện.',
            'is_public' => true,
            'location' => 'Binh Duong, Vietnam',
        ]);

        Deal::create([
            'company_id' => $company2->id,
            'title' => 'Dự án Project Emerald - Logistics M&A',
            'teaser' => 'Thoái vốn chiến lược khỏi mảng vận tải xanh. Đã có giấy phép hoạt động cảng biển.',
            'asking_price' => 12000000,
            'revenue_annual' => 8000000,
            'ebitda' => 1500000,
            'net_profit' => 1000000,
            'growth_percentage' => 15,
            'valuation' => 12000000,
            'equity_offered' => 100,
            'deal_type' => 'sale_100',
            'reason_for_sale' => 'Tập trung vào mảng kinh doanh cốt lõi khác.',
            'location' => 'Binh Duong, Vietnam',
            'status' => 'published',
            'is_confidential' => true,
        ]);
    }
}
