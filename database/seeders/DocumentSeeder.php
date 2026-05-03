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
            'title' => 'Financial Report 2024',
            'file_path' => 'documents/financial.pdf',
            'file_type' => 'pdf',
            'file_size' => 123456,
            'folder_name' => 'Financial',
            'is_private' => true
        ]);

        Document::create([
            'documentable_id' => $deal->id,
            'documentable_type' => Deal::class,
            'title' => 'Tax Returns 2023',
            'file_path' => 'documents/tax.pdf',
            'file_type' => 'pdf',
            'file_size' => 54321,
            'folder_name' => 'Financial',
            'is_private' => true
        ]);

        Document::create([
            'documentable_id' => $deal->id,
            'documentable_type' => Deal::class,
            'title' => 'Company Articles of Incorporation',
            'file_path' => 'documents/legal.pdf',
            'file_type' => 'pdf',
            'file_size' => 67890,
            'folder_name' => 'Legal',
            'is_private' => true
        ]);
    }
}
