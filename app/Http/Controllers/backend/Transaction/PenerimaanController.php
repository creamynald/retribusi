<?php

namespace App\Http\Controllers\backend\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Transaction\Penerimaan;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $penerimaan = Penerimaan::get();
        return view('backend.transaction.penerimaan.index', compact('penerimaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $penerimaan = new Penerimaan();
        return view('backend.transaction.penerimaan.form', compact('penerimaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'periode' => 'required',
            'kode_rekening' => 'required',
            'nama_rekening' => 'required',
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
            'bukti_pembayaran.mime' => 'Bukti Pembayaran harus berupa file .pdf, .jpg, .jpeg, .png',
            'jumlah.required' => 'Jumlah Setoran harus diisi'
        ]);

        $data = $request->all();
        if ($image = $request->file('bukti_pembayaran')) {
            $destinationPath = 'images/';
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
        //
        // $penerimaan = new Penerimaan();
        return view('backend.transaction.penerimaan.form', compact('penerimaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Penerimaan $penerimaan)
    {
        //
        // dd($request->all());
        $request->validate([
            'periode' => 'required',
            'kode_rekening' => 'required',
            'nama_rekening' => 'required',
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
        if ($image = $request->file('bukti_pembayaran')) {
            $destinationPath = 'images/';
            $postImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $postImage);
            $data['bukti_pembayaran'] = "$postImage";
        }else{
            unset($data['bukti_pembayaran']);
        }
        $penerimaan->update($data);
        return to_route('penerimaan.index')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, Penerimaan $penerimaan)
    {
        $get_file = Penerimaan::select('bukti_pembayaran')->whereId($penerimaan->id)->first();
        if (File::exists(public_path($get_file))) {
            dd('ada');
        }else{
            dd('gaada');
        }
        $penerimaan->delete();
        return back()->with('success', 'Selamat data berhasil dihapus');
    }
}
