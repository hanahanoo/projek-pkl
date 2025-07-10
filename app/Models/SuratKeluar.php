<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{

    protected $fillable = ['id', 'no_surat', 'tgl_surat', 'tujuan', 'perihal', 'file_surat', 'status'];
    public $timestamp = true;
}
