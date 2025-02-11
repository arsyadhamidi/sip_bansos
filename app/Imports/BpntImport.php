<?php

namespace App\Imports;

use App\Models\Bpnt;
use App\Models\LogUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\ToModel;

class BpntImport implements ToModel
{
    protected $createdBy;

    // Constructor to receive user id
    public function __construct($createdBy)
    {
        $this->createdBy = $createdBy;
    }

    // Main model method
    public function model(array $row)
    {
        if (empty($row[1])) {
            return null;
        }

        $nik = $row[2]; // Kolom D (NIK)
        $nik = ltrim($nik, "'"); // Remove leading apostrophe if present

        if (empty($nik)) {
            return null; // Skip if NIK is empty
        }

        $nikArray = explode(' ', $nik);
        if (count($nikArray) > 1) {
            $nik = implode(' ', array_slice($nikArray, 1)); // Removing first word if there are multiple words
        }

        // Check if the user already exists in the 'users' table
        $existingUser = User::where('username', '=', $nik)->first();

        if (!$existingUser) {
            // If NIK doesn't exist, create the user
            $this->createUser($row[1], $nik);
        }

        // Save PKH data
        return new Bpnt([
            'tgl_bpnt' => Carbon::now(),
            'penerima' => $row[1], // Column C
            'nik' => $nik,         // Column D after cleaned
            'alamat' => $row[3],   // Column E
            'rt' => $row[4],
            'created_at' => Carbon::now(),
            'created_by' => $this->createdBy,
            'is_deleted' => '1',
        ]);
    }

    // Function to create user
    private function createUser($name, $nik)
    {
        // Get current user and timestamp
        $users = Auth::user();
        $carbons = Carbon::now();

        // Create new user
        $user = User::create([
            'name' => strtoupper($name), // Convert name to uppercase
            'username' => strtoupper($nik), // Convert NIK to uppercase
            'password' => bcrypt('1234'),
            'duplicate' => '1234',
            'level' => 'Masyarakat',
            'created_at' => $carbons,
            'created_by' => $users->id,
            'is_deleted' => '1'
        ]);

        // Log user creation activity
        LogUser::create([
            'users_id' => $user->id,
            'aktivitas' => 'Membuat Data User Registrasi',
            'user' => $users->id,
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);
    }

    public function chunkSize(): int
    {
        return 1000;
    }
}
