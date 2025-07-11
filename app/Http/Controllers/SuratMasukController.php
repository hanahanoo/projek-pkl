<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\SuratMasuk;
use Illuminate\Http\Request;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        $suratMasuk = SuratMasuk::latest()->get();
        $listakun = User::where('role', '!=', 'admin')->get();
        $listUser = User::where('role', 'user')->get();
        return view ('admin.masuk.index', compact('suratMasuk', 'listakun', 'listUser'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.masuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|string|unique:surat_masuks',
            'tgl_surat' => 'required|date',
            'tgl_terima' => 'required|date',
            'pengirim' => 'required|string|max:225',
            'perihal' => 'required|string',
            'file_surat' => 'nullable|file',
        ]);
        $suratMasuk = new SuratMasuk();
        $suratMasuk->no_surat = $request->no_surat;
        $suratMasuk->tgl_surat = $request->tgl_surat;
        $suratMasuk->tgl_terima = $request->tgl_terima;
        $suratMasuk->pengirim = $request->pengirim;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->file_surat = $request->file_surat;
        $suratMasuk->save();

        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('masuk.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratMasuk $suratMasuk)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        return view('admin.masuk.edit', compact('suratMasuk'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required|string|unique:surat_masuks',
            'tgl_surat' => 'required|date',
            'tgl_terima' => 'required|date',
            'pengirim' => 'required|string|max:225',
            'perihal' => 'required|string',
            'file_surat' => 'nullable|file',
        ]);
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->no_surat = $request->no_surat;
        $suratMasuk->tgl_surat = $request->tgl_surat;
        $suratMasuk->tgl_terima = $request->tgl_terima;
        $suratMasuk->pengirim = $request->pengirim;
        $suratMasuk->perihal = $request->perihal;
        $suratMasuk->file_surat = $request->file_surat;
        $suratMasuk->save();

        
        toast('Data berhasil diubah', 'success');
        return redirect()->route('masuk.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratMasuk->delete();
        
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('masuk.index');
    }
}
