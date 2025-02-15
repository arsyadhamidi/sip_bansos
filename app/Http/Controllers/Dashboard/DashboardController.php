<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Beras;
use App\Models\Bpnt;
use App\Models\Lansia;
use App\Models\Pkh;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $countUsers = User::where('is_deleted', '1')->count();
        $countPkhs = Pkh::where('is_deleted', '1')->count();
        $countBpnts = Bpnt::where('is_deleted', '1')->count();
        $countLansias = Lansia::where('is_deleted', '1')->count();
        $countBeras = Beras::where('is_deleted', '1')->count();

        // Sudah Diambil
        $countSudahPkhs = Pkh::where('is_deleted', '1')->where('status', '1')->count();
        $countSudahBpnts = Bpnt::where('is_deleted', '1')->where('status', '1')->count();
        $countSudahLansias = Lansia::where('is_deleted', '1')->where('status', '1')->count();
        $countSudahBeras = Beras::where('is_deleted', '1')->where('status', '1')->count();

        // Belum Diambil
        $countBelumPkhs = Pkh::where('is_deleted', '1')->where('status', '2')->count();
        $countBelumBpnts = Bpnt::where('is_deleted', '1')->where('status', '2')->count();
        $countBelumLansias = Lansia::where('is_deleted', '1')->where('status', '2')->count();
        $countBelumBeras = Beras::where('is_deleted', '1')->where('status', '2')->count();

        return view("dashboard.main.index", [
            'countUsers' => $countUsers,
            'countPkhs' => $countPkhs,
            'countBpnts' => $countBpnts,
            'countLansias' => $countLansias,
            'countBeras' => $countBeras,

            'countSudahPkhs' => $countSudahPkhs,
            'countSudahBpnts' => $countSudahBpnts,
            'countSudahLansias' => $countSudahLansias,
            'countSudahBeras' => $countSudahBeras,

            'countBelumPkhs' => $countBelumPkhs,
            'countBelumBpnts' => $countBelumBpnts,
            'countBelumLansias' => $countBelumLansias,
            'countBelumBeras' => $countBelumBeras,
        ]);
    }
}
