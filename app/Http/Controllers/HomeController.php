<?php

namespace App\Http\Controllers;

use App\Models\Disposisi;
use App\Models\SuratKeluar;
use App\Models\SuratMasuk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role == 'admin'){
            $users = User::all();
            $suratMasuk = SuratMasuk::latest()->get();
            $suratKeluar = SuratKeluar::latest()->get();
            $totalUsers = $users->count();
            $totalMasuk = $suratMasuk->count();
            $totalKeluar = $suratKeluar->count();
            return view('admin.index', compact('totalMasuk', 'totalKeluar', 'totalUsers', 'suratMasuk', 'suratKeluar'));
        }elseif(Auth::user()->role == 'user'){
            $disposisi = Disposisi::where('user_id', Auth::user()->id)->get();
            $inbox = $disposisi->count();
            return view('admin.index', compact('inbox'));
        }elseif(Auth::user()->role == 'kepsek'){
            $users = User::all();
            $suratMasuk = SuratMasuk::latest()->get();
            $suratKeluar = SuratKeluar::latest()->get();
            $totalUsers = $users->count();
            $totalMasuk = $suratMasuk->count();
            $totalKeluar = $suratKeluar->count();
            return view('admin.index', compact('totalMasuk', 'totalKeluar', 'totalUsers', 'suratMasuk', 'suratKeluar'));
        }
    }
    public function download($id)
    {
        $surat = SuratMasuk::findOrFail($id);

        // validasi: apakah user emang dapat disposisi surat ini
        $user_id = Auth::user()->id;
        $isAuthorized = Disposisi::where('user_id', $user_id)->where('surat_masuk_id', $id)->exists();

        if (!$isAuthorized) {
            abort(403, 'Lu bukan yang ditugasin, diem aja bro 💀');
        }

        return response()->download(storage_path('app/public/' . $surat->file_surat));
    }
}
