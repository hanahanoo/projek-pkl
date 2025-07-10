<?php

namespace App\Http\Controllers;

use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index () {
        $data = [
            'totalSuratMasuks' => SuratMasuk::count(),
            'TotalUsers' => User::count()
        ];
        return view('admin.index', compact('data'));
    }
}
