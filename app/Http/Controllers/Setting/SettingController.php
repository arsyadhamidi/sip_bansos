<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use App\Models\LogUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        return view("setting.index");
    }

    public function updateprofile(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
        ], [
            'name.required' => 'Full Name is required',
        ]);

        $users = Auth()->user();
        $validated['updated_at'] = Carbon::now();
        $validated['updated_by'] = $users->level_id;

        User::where('id', $users->id)->update($validated);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Memperbaharui nama lengkap',
            'user' => $users->name,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_dibuat' => Carbon::now(),
        ]);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui nama lengkap');
    }

    public function updateusername(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required|max:225|unique:users',
        ], [
            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username maksimal 255 karakter',
            'username.unique' => 'Username sudah tersedia',
        ]);

        $users = Auth()->user();
        $validated['updated_at'] = Carbon::now();
        $validated['updated_by'] = $users->level_id;

        User::where('id', $users->id)->update($validated);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Memperbaharui Alamat Email',
            'user' => $users->name,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_dibuat' => Carbon::now(),
        ]);

        return back()->with('success', 'Selamat !! Anda berhasil memperbaharui data username');
    }

    public function updatepassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:1',
            'konfirmasipassword' => 'required|min:1|same:password'
        ], [
            'password.required' => 'Password wajib diisi',
            'konfirmasipassword.required' => 'Konfirmassi Password wajib diisi',
            'password.min' => 'Password minimal 1 karakter',
            'konfirmasipassword.min' => 'Konfirmasi Password minimal 1 karakter',
            'konfirmasipassword.same' => 'Konfirmasi Password harus sama dengan Password'
        ]);

        $users = Auth()->user();
        User::where('id', $users->id)->update([
            'password' => bcrypt($request->password),
            'duplicate' => $request->password,
            'updated_at' => Carbon::now(),
            'updated_by' => $users->level_id,
        ]);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Memperbaharui Password',
            'user' => $users->name,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_dibuat' => Carbon::now(),
        ]);

        return back()->with('success', 'Selamat ! anda berhasil memperbaharui data password');
    }

    public function updategambar(Request $request)
    {
        $validated = $request->validate([
            'foto_profile' => 'required|mimes:png,jpg,jpeg|max:10240',
        ], [
            'foto_profile.required' => 'Foto Profile wajib diisi',
            'foto_profile.mimes' => 'Foto Profile harus memiliki format PNG, JPG, atau JPEG',
            'foto_profile.max' => 'Foto Profile maksimal 10 MB',
        ]);

        $users = User::where('id', Auth()->user()->id)->first();
        $validated['updated_at'] = Carbon::now();
        $validated['updated_by'] = $users->level_id;
        if ($request->file('foto_profile')) {
            if ($users->foto_profile) {
                Storage::delete($users->foto_profile);
            }
            $validated['foto_profile'] = $request->file('foto_profile')->store('foto_profile');
        } else {
            $validated['foto_profile'] = $users->foto_profile;
        }

        $users->update($validated);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Memperbaharui Foto Profile',
            'user' => $users->name,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_dibuat' => Carbon::now(),
        ]);

        return back()->with('success', 'Selamat ! Anda berhasil memperbaharui foto profile anda');
    }

    public function deletegambar()
    {
        $users = User::where('id', Auth()->user()->id)->first();
        $validated['updated_at'] = Carbon::now();
        $validated['updated_by'] = $users->level_id;
        if ($users->foto_profile) {
            Storage::delete($users->foto_profile);
        }
        $validated['foto_profile'] = null;

        $users->update($validated);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Menghapus Foto Profile',
            'user' => $users->name,
            'tanggal' => Carbon::now()->toDateString(),
            'waktu_dibuat' => Carbon::now(),
        ]);

        return back()->with('success', 'Selamat ! Anda berhasil menghapus foto profile anda!');
    }
}
