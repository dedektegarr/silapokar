<?php

namespace App\Http\Controllers;

use App\Models\Kebakaran;
use App\Models\Laporan;
use App\Models\Penyelamatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index', [
            'page_title' => 'Dashboard',
            'kebakaran_count' => Kebakaran::count(),
            'penyelamatan_count' => Penyelamatan::count(),
            'laporan_count' => Laporan::count()
        ]);
    }
}
