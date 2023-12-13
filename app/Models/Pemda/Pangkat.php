<?php

namespace App\Models\Pemda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pangkat extends Model
{
    use HasFactory;

    protected $fillable = [
        'golongan',
        'pangkat',
    ];
}
