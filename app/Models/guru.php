<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode_guru',
        'nama',
        'jenis_kelamin',
        'no_telepon',
        'foto',
    ];
}