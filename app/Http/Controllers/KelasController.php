<?php

namespace App\Http\Controllers;

use App\Models\kelas;
use Illuminate\Http\Request;

class KelasController extends Controller
{
    public function detailKelas($id)
    {
        $kelas = kelas::with('materi')->findOrFail($id);
        return view('detail-kelas', ['kelas' => $kelas]);
    }
    public function semuaKelas()
    {
        $kelas = kelas::get();
        return view('semua-kelas', ['kelas' => $kelas]);
    }
}
