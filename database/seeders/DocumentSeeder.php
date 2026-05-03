<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Document;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deal = Deal::first();

        Document::create([
            'documentable_id' => $deal->id,
            'documentable_type' => Deal::class,
            'title' => 'Financial Report',
            'file_path' => 'documents/report.pdf',
            'file_type' => 'pdf',
            'file_size' => 123456,
            'is_private' => true
        ]);
    }
}
