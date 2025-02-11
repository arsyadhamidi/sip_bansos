<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\LogUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminUserController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPage = $request->input('length', 10);
            $search = $request->input('search', '');

            $query = User::where('is_deleted', '1');
            $query->orderBy('id', 'desc');

            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->Where('name', 'LIKE', "%{$search}%")
                        ->orWhere('username', 'LIKE', "%{$search}%");
                });
            }

            $totalRecords = $query->count(); // Hitung total data

            $data = $query->paginate($perPage); // Gunakan paginate() untuk membagi data sesuai dengan halaman dan jumlah per halaman

            return response()->json([
                'draw' => $request->input('draw'), // Ambil nomor draw dari permintaan
                'recordsTotal' => $totalRecords, // Kirim jumlah total data
                'recordsFiltered' => $totalRecords, // Jumlah data yang difilter sama dengan jumlah total
                'data' => $data->items(), // Kirim data yang sesuai dengan halaman dan jumlah per halaman
            ]);
        }

        return view('operator.user.index');
    }

    public function create(Request $request)
    {
        return view('operator.user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'level' => 'required',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.max' => 'Nama Lengkap tidak boleh lebih dari :max karakter',

            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username tidak boleh lebih dari :max karakter',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain',

            'level.required' => 'Level wajib diisi',
        ]);

        $users = Auth::user();
        $carbons = Carbon::now();

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'password' => bcrypt('1234'),
            'duplicate' => '1234',
            'level' => $request->level,
            'created_at' => $carbons,
            'created_by' => $users->id,
            'is_deleted' => '1'
        ]);

        LogUser::create([
            'users_id' => $user->id,
            'aktivitas' => 'Membuat Data User Registrasi',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menambahkan users registrasi !');
    }

    public function edit($id)
    {
        $users = User::where('id', $id)->first();
        return view('operator.user.edit', [
            'users' => $users,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:255',
            'username' => 'required|max:255|unique:users,username',
            'level' => 'required',
        ], [
            'name.required' => 'Nama Lengkap wajib diisi',
            'name.max' => 'Nama Lengkap tidak boleh lebih dari :max karakter',

            'username.required' => 'Username wajib diisi',
            'username.max' => 'Username tidak boleh lebih dari :max karakter',
            'username.unique' => 'Username sudah digunakan, silakan pilih yang lain',

            'level.required' => 'Level wajib diisi',
        ]);

        $users = Auth::user();
        $carbons = Carbon::now();
        $user = User::where('id', $id)->first();

        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'level' => $request->level,
            'updated_at' => $carbons,
            'updated_by' => $users->id,
        ]);

        LogUser::create([
            'users_id' => $user->id,
            'aktivitas' => 'Memperbaharui Data User Registrasi',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil memperbaharui users registrasi !');
    }

    public function destroy($id)
    {
        $users = Auth::user();
        $carbons = Carbon::now();
        $user = User::where('id', $id)->first();

        $user->update([
            'deleted_at' => $carbons,
            'deleted_by' => $users->id,
            'is_deleted' => '0'
        ]);

        LogUser::create([
            'users_id' => $user->id,
            'aktivitas' => 'Menghapus Data User Registrasi',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        return redirect()->route('data-user.index')->with('success', 'Selamat ! Anda berhasil menghapus users registrasi !');
    }
}
