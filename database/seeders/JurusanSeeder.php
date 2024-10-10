<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Jurusan;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jurusan::create([
            'nama_prodi' => 'TEKNIK KOMPUTER',
            'jenjang_prodi' => 'Diploma 3',
            'created_at' => now()
        ]);

        Jurusan::create([
            'nama_prodi' => 'MANAJEMEN INFORMATIKA',
            'jenjang_prodi' => 'Diploma 3',
            'created_at' => now()
        ]);
        Jurusan::create([
            'nama_prodi' => 'TEKNOLOGI REKAYASA PERANGKAT LUNAK',
            'jenjang_prodi' => 'Diploma 4',
            'created_at' => now()
        ]);

        Jurusan::create([
            'nama_prodi' => 'TEKNOLOGI REKAYASA MULTIMEDIA GRAFIS',
            'jenjang_prodi' => 'Diploma 4',
            'created_at' => now()
        ]);
    }
}
