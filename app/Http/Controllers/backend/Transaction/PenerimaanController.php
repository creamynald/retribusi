<?php

namespace App\Http\Controllers\backend\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaction\Penerimaan;
use App\Models\User;
use App\Models\Pemda\Upt;
use App\Models\jenisRetribusiDaerah\objekRetribusi;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //If user logged in as a OPD
        if (auth()->user()->hasRole(Role::findByName('opd'))) {
            // Mendapatkan data UPT berdasarkan opd_id
            $upt = Upt::where('opd_id', auth()->user()->opd_id)->get();
            // Cek apakah terdapat upt_id pada url
            if (isset($_GET['upt_id'])) {
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])->latest()->get();
            }else{
                // Melakukan pengambilan data upt id untuk kebutuhan whereIn agar data semua upt dibawah OPD dapat ditampilkan
               $data_upt = User::whereNotNull('upt_id')->where('opd_id', auth()->user()->opd_id)->select('upt_id')->get(); //
                // Menampilkan data Penerimaan Berdasarkan upt id yang berada di bawah OPD yang login
               $penerimaan = Penerimaan::whereIn('upt_id', $data_upt)->latest()->get(); //
            }
        } 
        elseif (auth()->user()->hasRole(Role::findByName('admin')) || auth()->user()->hasRole(Role::findByName('super admin'))) {
            $upt = Upt::all();
            if (isset($_GET['upt_id'])) {
                $penerimaan = Penerimaan::where('upt_id', $_GET['upt_id'])->latest()->get();
            }else{
               $penerimaan = Penerimaan::where('tgl_penyetoran', date("Y-m-d"))->latest()->get(); //
            }
        }
        // Jika user login sebagai UPT
        else{
            $upt = null;
            // Menampilkan data penerimaan berdasarkan upt yang login
            $penerimaan = $penerimaan = Penerimaan::where('user_id', auth()->user()->id)->latest()->get();
        }
        return view('backend.transaction.penerimaan.index', compact('penerimaan','upt'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penerimaan = new Penerimaan();
        $objek_retribusi = objekRetribusi::all();
        return view('backend.transaction.penerimaan.form', compact('penerimaan','objek_retribusi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'objekretribusi_id' => 'required',
            'tgl_penerimaan' => 'required',
            'tgl_penyetoran' => 'required',
            'bukti_pembayaran' => 'required|mimes:jpg,jpeg,png,pdf',
            'jumlah' => 'required',
        ],
        [
            'periode.required' => 'Periode harus diisi',
            'kode_rekening.required' => 'Kode Rekening harus diisi',
            'nama_rekening.required' => 'Nama Rekening harus diisi',
            'tgl_penerimaan.required' => 'Tanggal Penerimaan harus diisi',
            'tgl_penyetoran.required' => 'Tanggal Penyetoran harus diisi',
            'bukti_pembayaran.required' => 'Bukti Pembayaran harus diisi',
            'bukti_pembayaran.mime' => 'Bukti Pembayaran harus berupa file .jpg, .jpeg, .png',
            'jumlah.required' => 'Jumlah Setoran harus diisi'
        ]);
        $data = $request->all();
        
        $setoran = explode(",",$request->jumlah); //memecah angka jika terdapat koma pada bilangan ribuan
        $s = implode($setoran); //menyatukan kembali menjadi angka utuh tanpa koma
        $data['user_id'] = Auth::user()->id;
        $data['jumlah'] = $s;
        $data['status'] = 'Belum Diverifikasi';

        if ($image = $request->file('bukti_pembayaran')) {
            $destinationPath = public_path('public/Penerimaan');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $data['bukti_pembayaran'] = "$postImage";
        }
        Penerimaan::create($data);
        return to_route('penerimaan.index')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Penerimaan $penerimaan)
    {
        $objek_retribusi = objekRetribusi::all();
        return view('backend.transaction.penerimaan.form', compact('penerimaan','objek_retribusi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        $request->validate([
            'objekretribusi_id' => 'required',
            'tgl_penerimaan' => 'required',
            'tgl_penyetoran' => 'required',
            'bukti_pembayaran' => 'mimes:jpg,jpeg,png,pdf',
            'jumlah' => 'required',
        ],
        [
            'periode.required' => 'Periode harus diisi',
            'kode_rekening.required' => 'Kode Rekening harus diisi',
            'nama_rekening.required' => 'Nama Rekening harus diisi',
            'tgl_penerimaan.required' => 'Tanggal Penerimaan harus diisi',
            'tgl_penyetoran.required' => 'Tanggal Penyetoran harus diisi',
            'bukti_pembayaran.required' => 'Bukti Pembayaran harus diisi',
            'bukti_pembayaran.mime' => 'Bukti Pembayaran harus berupa file .pdf, .jpg, .jpeg, .png',
            'jumlah.required' => 'Jumlah Setoran harus diisi'
        ]);

        $data = $request->all();
        $setoran = explode(",",$request->jumlah); //memecah angka jika terdapat koma pada bilangan ribuan
        $s = implode($setoran); //menyatukan kembali menjadi angka utuh tanpa koma
        $data['jumlah'] = $s;
        if ($image = $request->file('bukti_pembayaran')) {
            $destinationPath = public_path('public/Penerimaan');
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $data['bukti_pembayaran'] = "$postImage";
            Storage::delete($penerimaan->bukti_pembayaran);
        }

        $penerimaan->update($data);
        return to_route('penerimaan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Penerimaan $penerimaan)
    {
        // Mengambil nama file sesuai id data yang akan dihapus
        $get_file = Penerimaan::select('bukti_pembayaran')->whereId($penerimaan->id)->first();
        // Cek apakah file gambar tersedia
        if (File::exists('images/'.$get_file->bukti_pembayaran)) {
            // jika tersedia lakukan penghapusan
            File::delete('images/'.$get_file->bukti_pembayaran);
        }
        // Delete Data
        $penerimaan->delete();
        return back()->with('success', 'Selamat data berhasil dihapus');
    }

    public function updateStatus(Request $r){
        Penerimaan::where('id', $r->id_penerimaan)->update([
            'status' => $r->status,
        ]);
        return back()->with('success', 'Data berhasil diverifikasi');
    }
}
