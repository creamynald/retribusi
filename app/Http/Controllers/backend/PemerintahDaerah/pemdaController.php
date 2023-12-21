<?php

namespace App\Http\Controllers\backend\PemerintahDaerah;

use App\Http\Controllers\Controller;
use App\Models\Pemda\Data;
use Illuminate\Http\Request;

class pemdaController extends Controller
{
    public function index()
    {
        return view('backend.pemerintah-daerah.pemda.index',[
            'data' => Data::all()
        ]);
    }
}
