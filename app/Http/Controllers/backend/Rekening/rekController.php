<?php

namespace App\Http\Controllers\backend\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening\rekening;
use Illuminate\Http\Request;

class rekController extends Controller
{
    public function index()
    {
        // dd(rekening::with('opd')->get());
        return view('backend.reks.index', [
            'datas' => rekening::all(),
        ]);
    }

    public function create()
    {
        return view('backend.reks.create', [
            'data' => new rekening(),
        ]);
    }
}
