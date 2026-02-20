<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            "email" => ['required', Rule::unique('users', 'email')],
            "password" => ["required"],
        ]);
        $validated['password'] = bcrypt($validated['password']);
        $user = User::create($validated);
        Auth::login($user);
        return redirect("/dashboard");
    }
}
