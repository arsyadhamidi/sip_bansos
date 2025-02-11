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
        return view("dashboard.main.index", [
            'countUsers' => $countUsers,
            'countPkhs' => $countPkhs,
            'countBpnts' => $countBpnts,
            'countLansias' => $countLansias,
            'countBeras' => $countBeras,
        ]);
    }
}
