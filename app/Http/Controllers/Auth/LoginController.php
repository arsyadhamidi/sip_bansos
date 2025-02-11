<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\LogUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view("auth.login");
    }

    public function authenticate(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ], [
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
        ]);

        if (Auth::attempt($validated)) {
            $users = Auth::user();
            if ($users->is_deleted == 1) {
                $request->session()->regenerate();
                $users->update([
                    'updated_login' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                    'updated_by' => $users->id,
                ]);

                LogUser::create([
                    'users_id' => $users->id,
                    'aktivitas' => 'Anda baru saja login',
                    'user' => $users->id,
                    'tanggal' => Carbon::now()->toDateString(),
                    'waktu_dibuat' => Carbon::now(),
                ]);

                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
                $request->session()->invalidate();
                return redirect('/login')->with('error', 'Maaf ! Akun anda telah tidak aktif lagi, silahkan hubungi teknisi di Lurah setempat.');
            }
        } else {
            return back()->with('error', 'Maaf ! Username atau Password Anda Salah!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        return redirect('/login')->with('success', 'You are successfully logged out!');
    }
}
