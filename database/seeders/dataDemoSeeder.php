<?php

namespace Database\Seeders;

use App\Models\Pemda\Data;
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
                'nama' => 'Dinas Pemadam Kebakaran Kabupaten Bengkalis',
                'alamat' => 'Jl. Jenderal Ahmad Yani, Bengkalis',
                'no_telp' => '(0766) 23113',
                'kode_pos' => '28711',
                'website' => 'https://damkar.bengkaliskab.go.id/',
            ],
            [
                'nama' => 'Dinas Kesehatan Kabupaten Bengkalis',
                'alamat' => 'Jl. Pertanian, Senggoro, Kec. Bengkalis',
                'no_telp' => '(0766) 23113',
                'kode_pos' => '28711',
                'website' => 'https://dinkes.bengkaliskab.go.id/',
            ],
        ]);

        Upt::insert([
            [
                'opd_id' => '1', // '1' is the id of the opd created above
                'nama' => 'UPT DAMKAR KEC. BANTAN',
                'alamat' => 'Jl. Bantan, Bengkalis',
                'no_telp' => '081234567890',
                'kode_pos' => '12345',
                'website' => 'https://example.com',
            ],
            [
                'opd_id' => '1', // '1' is the id of the opd created above
                'nama' => 'UPT DAMKAR KEC. PINGGIR',
                'alamat' => 'Jl. Pinggir, Bengkalis-Duri',
                'no_telp' => '081234567890',
                'kode_pos' => '12345',
                'website' => 'https://example.com',
            ],
            [
                'opd_id' => '2', // '2' is the id of the opd created above
                'nama' => 'UPT Puskesmas Bengkalis',
                'alamat' => 'Jl. Awang Mahmuda, Bengkalis',
                'no_telp' => '081234567890',
                'kode_pos' => '12345',
                'website' => 'https://example.com',
            ],
        ]);

        Data::insert([
            [
                'nama_pemkab' => 'Pemerintah Kabupaten Bengkalis',
                'nama_instansi' => 'Badan Pendapatan Daerah Kabupaten Bengkalis',
                'alamat' => 'Jl. Jend. Sudirman No. 1',
                'no_telp' => '(0761) 21201',
                'kode_pos' => '28711',
                'fax' => '(0761) 21201',
                'website' => 'https://bengkaliskab.go.id',
            ],
        ]);
    }
}
