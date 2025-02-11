<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\LogUser;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $carbons = Carbon::now();

        $users = User::create([
            'name' => 'Operator',
            'username' => 'Operator',
            'password' => bcrypt('1234'),
            'duplicate' => '1234',
            'level' => 'Operator',
            'created_at' => $carbons,
            'created_by' => '1',
            'is_deleted' => '1'
        ]);

        LogUser::create([
            'users_id' => $users->id,
            'aktivitas' => 'Membuat Data User Registrasi',
            'user' => '1',
            'tanggal' => $carbons->toDateString(),
            'waktu_dibuat' => $carbons,
        ]);
    }
}
