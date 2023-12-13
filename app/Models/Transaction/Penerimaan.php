<?php

namespace App\Models\Transaction;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'periode',
        'kode_rekening',
        'nama_rekening',
        'tgl_penerimaan',
        'tgl_penyetoran',
        'bukti_pembayaran',
        'jumlah',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
