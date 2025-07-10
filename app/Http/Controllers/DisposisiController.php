<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\SuratMasuk;
use App\Models\Disposisi;

class DisposisiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $suratMasukID = SuratMasuk::where('no_surat', $request->no_surat)->first();
        $disposisi = new Disposisi();
        $disposisi->surat_masuk_id = $suratMasukID->id;
        $disposisi->user_id = $request->user_id;
        $disposisi->catatan_disposisi = $request->catatan;
        $disposisi->save();
        $disposisi = true;
        if($disposisi){
            $suratMasuk = SuratMasuk::findOrFail($suratMasukID->id);
            $suratMasuk->status = 'didisposisi';
            $suratMasuk->save();
        }
        Alert::success('Added Successfully.');
        return redirect()->route('masuk.index');
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
