<?php

namespace App\Models\Rekening;

use App\Models\Pemda\Opd;
use App\Models\Pemda\Upt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rekening extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_bank',
        'atas_nama',
        'nomor_rekening',
        'opd_id',
        'upt_id',
    ];

    public function opd(){
        return $this->hasMany(Opd::class, 'id', 'opd_id');
    }

    public function upt(){
        return $this->hasMany(Upt::class, 'id', 'upt_id');
    }
}
