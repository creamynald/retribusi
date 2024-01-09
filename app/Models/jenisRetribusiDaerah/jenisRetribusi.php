<?php

namespace App\Models\jenisRetribusiDaerah;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jenisRetribusi extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'nama',
    ];

    public function objekRetribusi()
    {
        return $this->hasMany(objekRetribusi::class);
    }

}
