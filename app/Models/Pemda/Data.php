<?php

namespace App\Models\Pemda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemkab',
        'nama_instansi',
        'alamat',
        'no_telp',
        'kode_pos',
        'fax',
        'website',
        'target_retribusi_tahun_ini',
    ];
}
