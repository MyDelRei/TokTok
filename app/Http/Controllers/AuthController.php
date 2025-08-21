<?php

namespace App\Http\Controllers;

use App\Models\User;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class AuthController extends Controller
{

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
        ]);

        $user = User::where('user_id', $request->user_id)->first();

        if (!$user) {
            Alert::error('Login Failed', 'Invalid User ID');
            return back()->withInput();
        }

        session(['user' => $user]);

        if ($user->role === 'admin') {
            return redirect()->route('dashboard');
        } else if ($user->role === 'member') {
            return redirect()->route('member');
        }

        Alert::error('Login Failed', 'Role not recognized');
        return back()->withInput();
    }

    public function logout()
    {
        session()->forget('user');
        return redirect()->route('login');
    }
}
