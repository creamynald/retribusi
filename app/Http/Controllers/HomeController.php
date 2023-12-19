<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transaction\Penerimaan as Retribusi;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('backend.dashboard', [
            'jmlh_pengguna' => User::count(),

            'jumlah_pendapatan_penerimaan_hari_ini' => Retribusi::whereDate('created_at', date('Y-m-d'))->sum('jumlah'),

            // mengecek apakah user sudah input retribusi hari ini atau belum
            'cek_retribusi_hari_ini_per_user' => Retribusi::where('user_id', auth()->user()->id)->whereDate('created_at', date('Y-m-d'))->count(),

        ]);
    }
}
