<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengajuan = Pengajuan::with('category')->orderBy('id', 'desc')->get();
        return view('pengajuan.index', compact('pengajuan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = User::all();
        return view('pengajuan.create', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:user_id',
            'tujuan_surat' => 'required|string',
            'perihal' => 'required|string',
            'isi_surat' => 'required|string',
        ]);
        
        $pengajuan->user_id = $request->user_id;
        $pengajuan->tujuan_surat = $request->tujuan_surat;
        $pengajuan->perihal = $request->perihal;
        $pengajuan->isi_surat = $request->isi_surat;
        $pengajuan->save();


        return redirect()->route('pengajuan.index')->with('success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
