<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function myProfile()
    {
        $user = Auth::user();
        return view('user-profile.myprofile', compact('user'));
    }
    public function editProfile()
    {
        $user = Auth::user();
        return view('user-profile.editprofile', compact('user'));
    }
    public function updateProfile(Request $request)
    {
        $newName = ''; //nilai default
        if ($request->file('photo')) {
            $extension = $request->file('photo')->getClientOriginalExtension();
            $newName = $request->username . '-' . now()->timestamp . '.' . $extension;
            $request->file('photo')->storeAs('image/change-profile/', $newName);
        }
        $request['gambar'] = $newName;

        $request->validate([
            'username' => ['required', 'alpha_num', 'max:12'],
            'bio' => ['max:50'],
        ]);

        auth()->user()->update([
            'username' => $request->username,
            'gambar' => $request->gambar,
            'bio' => $request->bio,
        ]);

        return redirect('/myprofile')->with('message', 'profil anda sudah diperbarui');
    }
}
