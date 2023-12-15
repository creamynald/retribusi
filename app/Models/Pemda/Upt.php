<?php

namespace App\Models\Pemda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Upt extends Model
{
    use HasFactory;

    protected $fillable = [
        'opd_id',
        'nama',
        'no_telp',
        'kode_pos',
        'website',
        'alamat',
    ];

    public function opd()
    {
        return $this->belongsTo(Opd::class);
    }
}
