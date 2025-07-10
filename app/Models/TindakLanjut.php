<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TindakLanjut extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'surat_masuk_id', 'user_id', 'uraian_tindak_lanjut'];
    public $timestamp = true;

    public function suratMasuk(){
        return $this->belongsTo(SuratMasuk::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
    }
}
