<?php

namespace App\Models\jenisRetribusiDaerah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objekRetribusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenis_retribusi_id',
        'kode',
        'nama',
    ];

    public function jenisRetribusi()
    {
        return $this->belongsTo(jenisRetribusi::class);
    }
}