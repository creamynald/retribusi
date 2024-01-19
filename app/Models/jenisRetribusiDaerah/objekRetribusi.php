<?php

namespace App\Models\jenisRetribusiDaerah;

use App\Models\Transaction\Penerimaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objekRetribusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_retribusi_id',
        'kode',
        'nama',
        'target',
        'tahun',
    ];

    public function jenisRetribusi()
    {
        return $this->belongsTo(jenisRetribusi::class);
    }

    public function penerimaans()
    {
        return $this->hasMany(Penerimaan::class);
    }
}
