<?php

namespace App\Http\Controllers;

use App\Models\SuratKeluar;
use Illuminate\Http\Request;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Hapus Data!';
        $text = "Apakah anda yakin?";
        confirmDelete($title, $text);
        $suratKeluar = SuratKeluar::latest()->get();
        return view ('admin.keluar.index', compact('suratKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.keluar.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'no_surat' => 'required|unique:surat_keluars',
            'tgl_surat' => 'required|date',
            'tujuan' => 'required',
            'perihal' => 'required|string',
            'file_surat' => 'required',
        ]);
        $suratKeluar = new SuratKeluar();
        $suratKeluar->no_surat = $request->no_surat;
        $suratKeluar->tgl_surat = $request->tgl_surat;
        $suratKeluar->tujuan = $request->tujuan;
        $suratKeluar->perihal = $request->perihal;
        $suratKeluar->file_surat = $request->file_surat;
        $suratKeluar->save();

        toast('Data berhasil ditambahkan', 'success');
        return redirect()->route('keluar.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(SuratKeluar $suratKeluar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $suratKeluar = SuratKeluar::findOrFail($id);
        return view('admin.keluar.edit', compact('suratKeluar'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'no_surat' => 'required|string|unique:surat_keluars',
            'tgl_surat' => 'required|date',
            'tujuan' => 'required|date',
            'perihal' => 'required|string',
            'file_surat' => 'required|string',
        ]);
        $suratMasuk = SuratMasuk::findOrFail($id);
        $suratKeluar->no_surat = $request->no_surat;
        $suratKeluar->tgl_surat = $request->tgl_surat;
        $suratKeluar->tujuan = $request->tujuan;
        $suratKeluar->perihal = $request->perihal;
        $suratKeluar->file_surat = $request->file_surat;
        $suratKeluar->save();

        
        toast('Data berhasil diubah', 'success');
        return redirect()->route('keluar.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $suratKeluar =SuratKeluar::findOrFail($id);
        $suratKeluar->delete();
        
        toast('Data berhasil dihapus', 'success');
        return redirect()->route('keluar.index');
    }
}
