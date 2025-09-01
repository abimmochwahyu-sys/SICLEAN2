<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Layanan extends Model
{
    protected $fillable = ['nama_pelanggan', 'jenis_layanan',  'estimasi_waktu'];
}
