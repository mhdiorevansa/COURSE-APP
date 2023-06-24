<?php

namespace App\Http\Controllers;

use App\Models\quiz;
use App\Models\kelas;
use App\Models\materi;
use Illuminate\Http\Request;

class MateriController extends Controller
{
    public function MateriDetail($id)
    {
        $kelas = kelas::with('materi', 'quiz')->find($id);
        $materi = materi::with('kelas')->find($id);
        $materiTerakhir = materi::latest()->first();
        $previousMateri = Materi::where('id_materi', '<', $id)->orderBy('id_materi', 'desc')->first();
        $nextMateri = Materi::where('id_materi', '>', $id)->orderBy('id_materi')->first();

        return view('materi-detail', compact('materi', 'previousMateri', 'nextMateri', 'materiTerakhir', 'kelas'));
    }
    public function codeTest($id)
    {
        $materi = materi::find($id);
        return view('code.code-editor', ['materi' => $materi]);
    }
}
