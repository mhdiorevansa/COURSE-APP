<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\kelas;
use App\Models\feedback;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LandingPageController extends Controller
{
    public function index()
    {
        $kelas = kelas::get();
        $user = User::get();
        $feedback = feedback::with('user')->get();
        return view('landing-page', ['kelas' => $kelas, 'user' => $user, 'feedback' => $feedback]);
    }
}
