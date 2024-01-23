<?php

namespace App\Http\Controllers\backend\Laporan;

use App\Http\Controllers\Controller;
use App\Models\jenisRetribusiDaerah\jenisRetribusi;
use App\Models\jenisRetribusiDaerah\objekRetribusi;
use Illuminate\Http\Request;
use App\Models\Pemda\Opd;
use App\Models\Pemda\Upt;
use App\Models\User;
use App\Models\Transaction\Penerimaan;
use Spatie\Permission\Models\Role;
use Carbon\Carbon;

class laporanController extends Controller
{
    // Laporan Harian
    public function index()
    {
        // Jika user login sebagai super admin atau admin
        if (
            auth()
                ->user()
                ->hasRole(Role::findByName('super admin')) ||
            auth()
                ->user()
                ->hasRole(Role::findByName('admin'))
        ) {
            if (isset($_GET['upt_id'])) {
                $upt = upt::get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->where('tgl_penyetoran', date('Y-m-d'))
                    ->latest()
                    ->get();
            } else {
                $upt = upt::get();
                $penerimaan = Penerimaan::where('tgl_penyetoran', date('Y-m-d'))
                    ->latest()
                    ->get();
            }
        }
        //Jika user login sebagai OPD
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('opd'))
        ) {
            if (isset($_GET['upt_id'])) {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->where('tgl_penyetoran', date('Y-m-d'))
                    ->latest()
                    ->get();
            } else {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                // Melakukan pengambilan data upt id untuk kebutuhan whereIn agar data semua upt dibawah OPD dapat ditampilkan
                $dta_upt = Upt::whereOpdId(auth()->user()->opd_id)
                    ->select('id')
                    ->get(); //
                // Menampilkan data Penerimaan Berdasarkan upt id yang berada di bawah OPD yang login
                $penerimaan = Penerimaan::whereIn('upt_id', $dta_upt)
                    ->latest()
                    ->get(); //
            }
        }
        // Jika user login sebagai UPT
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('upt'))
        ) {
            $upt = null; // untuk menghindari error pada compact
            $penerimaan = Penerimaan::where('upt_id', auth()->user()->upt_id)
                ->where('tgl_penyetoran', date('Y-m-d'))
                ->latest()
                ->get();
        }
        return view('backend.transaction.penerimaan.laporan', compact('penerimaan', 'upt'));
    }

    // Laporan Bulanan
    public function monthly_report()
    {
        // Jika user login sebagai super admin atau admin
        if (
            auth()
                ->user()
                ->hasRole(Role::findByName('super admin')) ||
            auth()
                ->user()
                ->hasRole(Role::findByName('admin'))
        ) {
            if (isset($_GET['upt_id']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
                $upt = upt::get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->whereMonth('tgl_penyetoran', $_GET['bulan'])
                    ->latest()
                    ->get();
            } else {
                $upt = upt::get();
                $penerimaan = Penerimaan::whereYear('tgl_penyetoran', date('Y'))
                    ->whereMonth('tgl_penyetoran', date('m'))
                    ->latest()
                    ->get();
            }
        }
        //Jika user login sebagai OPD
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('opd'))
        ) {
            if (isset($_GET['upt_id']) && isset($_GET['bulan']) && isset($_GET['tahun'])) {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->whereMonth('tgl_penyetoran', $_GET['bulan'])
                    ->latest()
                    ->get();
            } else {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                // Melakukan pengambilan data upt id untuk kebutuhan whereIn agar data semua upt dibawah OPD dapat ditampilkan
                $dta_upt = Upt::whereOpdId(auth()->user()->opd_id)
                    ->select('id')
                    ->get(); //
                // Menampilkan data Penerimaan Berdasarkan upt id yang berada di bawah OPD yang login
                $penerimaan = Penerimaan::whereIn('upt_id', $dta_upt)
                    ->whereMonth('tgl_penyetoran', date('m'))
                    ->latest()
                    ->get(); //
            }
        }
        // Jika user login sebagai UPT
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('upt'))
        ) {
            if (isset($_GET['bulan']) && isset($_GET['tahun'])) {
                $upt = null; // untuk menghindari error pada compact
                $penerimaan = Penerimaan::where('upt_id', auth()->user()->upt_id)
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->whereMonth('tgl_penyetoran', $_GET['bulan'])
                    ->latest()
                    ->get();
            } else {
                $upt = null; // untuk menghindari error pada compact
                $penerimaan = Penerimaan::where('upt_id', auth()->user()->upt_id)
                    ->whereYear('tgl_penyetoran', date('Y'))
                    ->whereMonth('tgl_penyetoran', date('m'))
                    ->latest()
                    ->get();
            }
        }
        return view('backend.transaction.penerimaan.laporan_bulanan', compact('penerimaan', 'upt'));
    }

    // Laporan Tahunan
    public function annual_report()
    {
        // Jika user login sebagai super admin atau admin
        if (
            auth()
                ->user()
                ->hasRole(Role::findByName('super admin')) ||
            auth()
                ->user()
                ->hasRole(Role::findByName('admin'))
        ) {
            if (isset($_GET['upt_id']) && isset($_GET['tahun'])) {
                $upt = upt::get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->latest()
                    ->get();
            } else {
                $upt = upt::get();
                $penerimaan = Penerimaan::whereYear('tgl_penyetoran', date('Y'))
                    ->whereMonth('tgl_penyetoran', date('m'))
                    ->get();
            }
        }
        //Jika user login sebagai OPD
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('opd'))
        ) {
            if (isset($_GET['upt_id']) && isset($_GET['tahun'])) {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->latest()
                    ->get();
            } else {
                $upt = Upt::whereOpdId(auth()->user()->opd_id)->get();
                // Melakukan pengambilan data upt id untuk kebutuhan whereIn agar data semua upt dibawah OPD dapat ditampilkan
                $dta_upt = Upt::whereOpdId(auth()->user()->opd_id)
                    ->select('id')
                    ->get(); //
                // Menampilkan data Penerimaan Berdasarkan upt id yang berada di bawah OPD yang login
                $penerimaan = Penerimaan::whereIn('upt_id', $dta_upt)
                    ->whereYear('tgl_penyetoran', date('Y'))
                    ->latest()
                    ->get(); //
            }
        }
        // Jika user login sebagai UPT
        elseif (
            auth()
                ->user()
                ->hasRole(Role::findByName('upt'))
        ) {
            if (isset($_GET['tahun'])) {
                $upt = null; // untuk menghindari error pada compact
                $penerimaan = Penerimaan::where('upt_id', auth()->user()->upt_id)
                    ->whereYear('tgl_penyetoran', $_GET['tahun'])
                    ->latest()
                    ->get();
            } else {
                $upt = null; // untuk menghindari error pada compact
                $penerimaan = Penerimaan::where('upt_id', auth()->user()->upt_id)
                    ->whereYear('tgl_penyetoran', date('Y'))
                    ->latest()
                    ->get();
            }
        }
        return view('backend.transaction.penerimaan.laporan_tahunan', compact('penerimaan', 'upt'));
    }

    public function target()
    {
        return view('backend.transaction.rekap.index',[
            'datas' => jenisRetribusi::all(),
            'total_retribusi_tahun_ini' => Penerimaan::whereYear('tgl_penyetoran', date('Y'))->sum('jumlah'),
        ]);
    }

    public function rekapitulasi()
    {
        return view('backend.transaction.rekap2.index',[
            'datas' => Penerimaan::whereYear('tgl_penyetoran', date('Y'))->get(),
        ]);
    }
}
