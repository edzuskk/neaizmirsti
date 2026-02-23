<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{
    public function showProfile()
    {
        return view('profile.profile');
    }

    public function showEditForm()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function editProfile(Request $request)
    {
        $user = auth()->user();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route('profile')->with('success', 'Profils veiksmīgi atjaunināts!');
    }

    public function deleteProfile()
    {
        $user = auth()->user();
        $user->delete();

        return redirect('/')->with('success', 'Profils veiksmīgi dzēsts!');
    }

    public function showChangeForm()
    {
        return view('profile.change');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        $user = auth()->user();

        if (! Hash::check($request->input('current_password'), $user->password)) {
            return back()->withErrors(['current_password' => 'Pašreizējā parole nav pareiza.']);
        }

        $user->password = Hash::make($request->input('new_password'));
        $user->save();

        $request->session()->regenerate();

        return redirect()->route('profile')->with('success', 'Parole veiksmīgi mainīta!');
    }
}
