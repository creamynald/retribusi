<?php

namespace Database\Seeders;

use App\Models\Pemda\Jabatan;
use App\Models\Pemda\Pangkat;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataDemoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Pangkat::insert([
            [
                'golongan' => 'Honorer',
                'pangkat' => 'Pegawai Honorer',
            ],
            [
                'golongan' => 'Ia',
                'pangkat' => 'Juru Muda',
            ],
            [
                'golongan' => 'IIb',
                'pangkat' => 'Pengatur Muda Tk.I',
            ],
            [
                'golongan' => 'IIIc',
                'pangkat' => 'Penata',
            ]
        ]);

        Jabatan::insert([
            [
                'nama' => 'Staf',
            ],
            [
                'nama' => 'Staf Honorer',
            ],

            [
                'nama' => 'Bendahara Penerimaan',
            ]
        ]);
    }
}
