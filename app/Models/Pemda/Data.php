<?php

namespace App\Models\Pemda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemda',
        'nama_ibu_kota',
        'nama_kepala_daerah'
    ];
}
