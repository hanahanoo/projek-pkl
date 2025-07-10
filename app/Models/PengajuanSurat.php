<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanSurat extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'tujuan_surat', 'perihal', 'isi_surat', 'status_pengajuan'];
    public $timestamp = true;
}
