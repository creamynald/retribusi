<?php

namespace Database\Seeders;

use App\Models\Pemda\Opd;
use App\Models\Pemda\Upt;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Opd::insert([
            [
                'nama' => 'OPD Example',
                'alamat' => 'Jl. Example',
                'no_telp' => '081234567890',
                'kode_pos' => '12345',
                'website' => 'https://example.com',
            ],
        ]);

        Upt::insert([
            [
                'opd_id' => '1', // '1' is the id of the opd created above
                'nama' => 'UPT Example',
                'alamat' => 'Jl. Example',
                'no_telp' => '081234567890',
                'kode_pos' => '12345',
                'website' => 'https://example.com',
            ],
        ]);
    }
}
