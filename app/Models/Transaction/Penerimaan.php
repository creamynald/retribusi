<?php

namespace App\Models\Transaction;

use App\Models\User;
use App\Models\Pemda\Upt;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penerimaan extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'upt_id',
        'periode',
        'kode_rekening',
        'nama_rekening',
        'tgl_penerimaan',
        'tgl_penyetoran',
        'bukti_pembayaran',
        'jumlah',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function upt()
    {
        return $this->belongsTo(Upt::class,'upt_id');
    }

    public static function total_retribusi($upt_id){
        return Penerimaan::where('upt_id', $upt_id)->sum('jumlah');
    }
}
