<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RankingController extends Controller
{
    public function rankingIndex()
    {
        $users = User::where('role_id', '!=', 1)->orderBy('skor', 'desc')->orderBy('created_at')->paginate(10);
        $topUsers = $users->take(3);
        $remainingUsers = $users->slice(3);
        return view('ranking', ['users' => $users, 'topUsers' => $topUsers, 'remainingUsers' => $remainingUsers]);
    }
}
