<?php

namespace Database\Seeders;

use App\Models\jenisRetribusiDaerah\jenisRetribusi;
use App\Models\jenisRetribusiDaerah\objekRetribusi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class dataDemoRetribusi extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        jenisRetribusi::insert([
            [
                'kode' => '4.1.02.01',
                'nama' => 'Retribusi Jasa Umum',
            ],
            [
                'kode' => '4.1.02.02',
                'nama' => 'Retribusi Jasa Usaha',
            ],
            [
                'kode' => '4.1.02.03',
                'nama' => 'Retribusi Perizinan Tertentu',
            ],
        ]);

        objekRetribusi::insert([
            [
                'jenis_retribusi_id' => '1',
                'kode' => '4.1.02.01.02.0001',
                'nama' => 'Retribusi Pelayanan Persampahan/Kebersihan',
            ],
            [
                'jenis_retribusi_id' => '1',
                'kode' => '4.1.02.01.04.0001',
                'nama' => 'Retribusi Penyediaan Pelayanan Parkir di Tepi Jalan Umum',
            ],
            [
                'jenis_retribusi_id' => '2',
                'kode' => '4.1.02.02.01.0005',
                'nama' => 'Retribusi Pemakaian Ruangan',
            ],
            [
                'jenis_retribusi_id' => '2',
                'kode' => '4.1.02.02.01.0007',
                'nama' => 'Retribusi pemakaian alat',
            ],
            [
                'jenis_retribusi_id' => '3',
                'kode' => '4.1.02.03.03.0001',
                'nama' => 'Retribusi Izin Trayek Untuk Menyediakan Pelayanan Angkutan Umum',
            ],
            [
                'jenis_retribusi_id' => '3',
                'kode' => '4.1.02.03.04.0002',
                'nama' => 'Retribusi Izin Usaha Kegiatan Usaha Pembudidayaan Ikan',
            ],
            [
                'jenis_retribusi_id' => '3',
                'kode' => '4.1.02.03.07.0001',
                'nama' => 'Retribusi Persetujuan Bangunan Gedung',
            ],
        ]);
    }
}
