<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\SuratKeluar;
use App\Models\Disposisi;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $item = [
            'totalSuratMasuks' => SuratMasuk::count(),
            'totalSuratKeluars' => SuratKeluar::count(),
            'totalDisposisi' => Disposisi::count(),
            'TotalUsers' => User::count()
        ];
        return view('admin.index', compact('item'));
    }
}
