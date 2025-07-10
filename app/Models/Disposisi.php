<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Disposisi;

class Disposisi extends Model
{
    protected $fillable = ['id', 'surat_masuk_id', 'user_id', 'catatan_disposisi'];
    public $timestamp = true;

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class, 'surat_masuk_id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
