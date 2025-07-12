<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $fillable = [
        'nisn',
        'nama_siswa',
        'kelas',
        'paralel',
        'kehadiran',
        'jam_masuk',
        'jam_pulang',
        'keterangan',
    ];
}