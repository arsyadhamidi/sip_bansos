<?php

namespace App\Http\Controllers\Admin;

use PDF;
use App\Exports\BpntExport;
use App\Http\Controllers\Controller;
use App\Imports\BpntImport;
use App\Models\Bpnt;
use App\Models\LogBpnt;
use App\Models\LogUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Facades\Excel;

class AdminBpntController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $perPage = $request->input('length', 10);
            $search = $request->input('search', '');

            $query = Bpnt::where('is_deleted', '1');
            $query->orderBy('id', 'desc');

            if ($search) {
                $query->where(function ($query) use ($search) {
                    $query->Where('nik', 'LIKE', "%{$search}%")
                        ->orWhere('penerima', 'LIKE', "%{$search}%")
                        ->orWhere('alamat', 'LIKE', "%{$search}%")
                        ->orWhere('rt', 'LIKE', "%{$search}%");
                });
            }

            if ($request->has('start_date') && $request->has('end_date')) {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
                $query->whereBetween('tgl_bpnt', [$start_date, $end_date]);
            }

            $totalRecords = $query->count(); // Hitung total data

            $data = $query->paginate($perPage); // Gunakan paginate() untuk membagi data sesuai dengan halaman dan jumlah per halaman

            $dataWithActions = $data->map(function ($item) {
                $showUrl = route('data-bpnt.generatepdf', $item->id);

                $item->aksi = '
                    <a href="' . $showUrl . '" class="btn btn-info" target="_blank">
                        <i class="fa fa-download"></i>
                        Download
                    </a>
                ';
                return $item;
            });

            return response()->json([
                'draw' => $request->input('draw'), // Ambil nomor draw dari permintaan
                'recordsTotal' => $totalRecords, // Kirim jumlah total data
                'recordsFiltered' => $totalRecords, // Jumlah data yang difilter sama dengan jumlah total
                'data' => $dataWithActions, // Kirim data yang sesuai dengan halaman dan jumlah per halaman
            ]);
        }

        return view('operator.bpnt.index');
    }

    public function create()
    {
        return view('operator.bpnt.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'penerima' => 'required|max:255',
            'nik' => 'required|max:255',
            'alamat' => 'required|max:500',
            'rt' => 'required|max:255',
            'tgl_bpnt' => 'required',
            'status' => 'required',
        ], [
            'penerima.required' => 'Nama penerima wajib diisi.',
            'penerima.max' => 'Nama penerima maksimal 255 karakter.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.max' => 'NIK maksimal 255 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'rt.required' => 'RT wajib diisi.',
            'rt.max' => 'RT maksimal 255 karakter.',
            'tgl_bpnt.required' => 'Tanggal BPNT wajib diisi.',
            'status.required' => 'Status wajib diisi.',
        ]);

        // Mengambil data pengguna yang sedang login
        $users = Auth::user();
        $carbons = Carbon::now();

        // Menyimpan data PKH dengan mengubah input menjadi huruf kapital
        $bpnts = Bpnt::create([
            'tgl_bpnt' => $request->tgl_bpnt, // Mengubah penerima menjadi huruf kapital
            'penerima' => strtoupper($request->penerima), // Mengubah penerima menjadi huruf kapital
            'nik' => strtoupper($request->nik),           // Mengubah NIK menjadi huruf kapital
            'alamat' => strtoupper($request->alamat),     // Mengubah alamat menjadi huruf kapital
            'rt' => strtoupper($request->rt),             // Mengubah RT menjadi huruf kapital
            'status' => strtoupper($request->status),             // Mengubah RT menjadi huruf kapital
            'created_at' => $carbons,
            'created_by' => $users->id,
            'is_deleted' => '1',
        ]);

        // Menyimpan log aktivitas BPNT
        LogBpnt::create([
            'bpnt_id' => $bpnts->id,
            'aktivitas' => 'Membuat Data BPNT',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        // Mengecek apakah NIK sudah digunakan oleh user lain
        $checkUsername = User::where('username', '=', $request->nik)->first();
        if (empty($checkUsername)) {
            // Membuat user baru dengan data yang sudah diubah menjadi huruf kapital
            $user = User::create([
                'name' => strtoupper($request->penerima),     // Mengubah nama penerima menjadi huruf kapital
                'username' => strtoupper($request->nik),      // Mengubah NIK menjadi huruf kapital
                'password' => bcrypt('1234'),
                'duplicate' => '1234',
                'level' => 'Masyarakat',
                'created_at' => $carbons,
                'created_by' => $users->id,
                'is_deleted' => '1'
            ]);

            // Menyimpan log aktivitas user
            LogUser::create([
                'users_id' => $user->id,
                'aktivitas' => 'Membuat Data User Registrasi',
                'user' => $users->id,
                'tanggal' => $carbons->toDateString(),
                'waktu_dibuat' => $carbons,
            ]);
        }

        return redirect()->route('data-bpnt.index')->with('success', 'Selamat ! Anda berhasil menambahkan data bpnt !');
    }

    public function edit($id)
    {
        $bpnts = Bpnt::where('id', $id)->first();
        return view('operator.bpnt.edit', [
            'bpnts' => $bpnts,
        ]);
    }

    public function update(Request $request, $id)
    {
        // Validasi input dari request
        $request->validate([
            'tgl_bpnt' => 'required',
            'penerima' => 'required|max:255',
            'nik' => 'required|max:255',
            'alamat' => 'required|max:500',
            'rt' => 'required|max:255',
            'status' => 'required|max:255',
        ], [
            'tgl_bpnt.required' => 'Tanggal BPNT wajib diisi.',
            'penerima.required' => 'Nama penerima wajib diisi.',
            'penerima.max' => 'Nama penerima maksimal 255 karakter.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.max' => 'NIK maksimal 255 karakter.',
            'alamat.required' => 'Alamat wajib diisi.',
            'alamat.max' => 'Alamat maksimal 500 karakter.',
            'rt.required' => 'RT wajib diisi.',
            'rt.max' => 'RT maksimal 255 karakter.',
            'status.required' => 'Status wajib diisi.',
            'status.max' => 'Status maksimal 255 karakter.',
        ]);

        // Mencari data PKH berdasarkan ID
        $bpnts = Bpnt::findOrFail($id);

        // Mengambil data pengguna yang sedang login
        $users = Auth::user();
        $carbons = Carbon::now();

        // Mengubah data PKH menjadi huruf kapital dan memperbarui data PKH
        $bpnts->update([
            'tgl_bpnt' => $request->tgl_bpnt,
            'penerima' => strtoupper($request->penerima), // Mengubah penerima menjadi huruf kapital
            'nik' => strtoupper($request->nik),           // Mengubah NIK menjadi huruf kapital
            'alamat' => strtoupper($request->alamat),     // Mengubah alamat menjadi huruf kapital
            'rt' => strtoupper($request->rt),             // Mengubah RT menjadi huruf kapital
            'status' => strtoupper($request->status),
            'updated_at' => $carbons,
            'updated_by' => $users->id,                    // Menyimpan ID pengguna yang mengupdate
        ]);

        // Menyimpan log aktivitas PKH (Update)
        LogBpnt::create([
            'bpnt_id' => $bpnts->id,
            'aktivitas' => 'Memperbarui Data BPNT',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        return redirect()->route('data-bpnt.index')->with('success', 'Selamat! Anda berhasil memperbarui data BPNT!');
    }

    public function destroy($id)
    {
        // Mencari data PKH berdasarkan ID
        $bpnts = Bpnt::findOrFail($id);

        // Mengambil data pengguna yang sedang login
        $users = Auth::user();
        $carbons = Carbon::now();

        // Mengubah data PKH menjadi huruf kapital dan memperbarui data PKH
        $bpnts->update([          // Mengubah RT menjadi huruf kapital
            'deleted_at' => $carbons,
            'deleted_by' => $users->id,
            'is_deleted' => '0'                  // Menyimpan ID pengguna yang mengupdate
        ]);

        // Menyimpan log aktivitas PKH (Update)
        LogBpnt::create([
            'bpnt_id' => $bpnts->id,
            'aktivitas' => 'Menghapus Data BPNT',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);

        return redirect()->route('data-bpnt.index')->with('success', 'Selamat! Anda berhasil menghapus data BPNT!');
    }

    public function importbpnt(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xlsx,csv',
        ], [
            'file.required' => 'File BPNT wajib diisi',
            'file.mimes' => 'File BPNT Di import harus memiliki format xlsx atau csv'
        ]);
        // Ambil id dari user yang sedang login
        $createdBy = Auth::user()->id;

        // Panggil import dengan melewatkan id pengguna
        Excel::import(new BpntImport($createdBy), $request->file('file'));

        return back()->with('success', 'Data PKH berhasil diimport');
    }

    public function generateexcel(Request $request)
    {
        $query = Bpnt::where('is_deleted', '1');

        if ($request->has('start_date') && $request->has('end_date')) {
            $start_date = $request->start_date;
            $end_date = $request->end_date;
            $query->whereBetween('tgl_bpnt', [$start_date, $end_date]);
        }

        $data = $query->orderBy('id', 'desc')->get();
        return Excel::download(new BpntExport($data), 'data-bpnt.xlsx');
    }

    public function generatepdf($id)
    {
    	$results = Bpnt::where('id', $id)->first();

    	$pdf = PDF::loadview('operator.bpnt.export-pdf',['results'=> $results]);
    	return $pdf->stream('data_bpnt.pdf');
    }
}
