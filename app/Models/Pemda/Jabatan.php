<?php

namespace App\Models\Pemda;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Jabatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama'
    ];

}
