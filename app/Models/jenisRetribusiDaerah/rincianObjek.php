<?php

namespace App\Models\jenisRetribusiDaerah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction\Penerimaan;

class rincianObjek extends Model
{
    use HasFactory;

    protected $fillable = [
        'objek_retribusi_id',
        'kode',
        'nama',
        'target',
        'tahun',
    ];

    public function objekRetribusi()
    {
        return $this->belongsTo(objekRetribusi::class);
    }

}
