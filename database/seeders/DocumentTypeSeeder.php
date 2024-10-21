<?php

namespace Database\Seeders;

use App\Models\DocumentType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $documentTypes = [
            ['name' => 'Surat Umum'],
            ['name' => 'Surat Konfidensial'],
            ['name' => 'Surat Izin'],
            ['name' => 'Surat Keputusan'],
            ['name' => 'Surat Pernyataan'],
            ['name' => 'Surat Pemberitahuan'],
            ['name' => 'Surat Perintah'],
            ['name' => 'Surat Perjanjian'],
        ];

        foreach ($documentTypes as $documentType) {
            DocumentType::create($documentType);
        }
    }
}
