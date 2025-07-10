<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Siswa; // Jika Anda punya model Siswa

class SiswaController extends Controller
{
    public function index()
    {
        // Di sinilah Anda akan mengambil data siswa dari database
        // Contoh data dummy yang sudah diperbarui agar memiliki 'paralel' dan 'no_telp_wali'
        $siswa = [
            [ 'id' => 1, 'nis' => '001', 'nama_siswa' => 'Agus Setiawan', 'jenis_kelamin' => 'Laki-laki', 'kelas' => '7', 'paralel' => 'A', 'no_telp_wali' => '081234567890' ],
            [ 'id' => 2, 'nis' => '002', 'nama_siswa' => 'Budi Santoso', 'jenis_kelamin' => 'Laki-laki', 'kelas' => '7', 'paralel' => 'B', 'no_telp_wali' => '081298765432' ],
            [ 'id' => 3, 'nis' => '003', 'nama_siswa' => 'Citra Dewi', 'jenis_kelamin' => 'Perempuan', 'kelas' => '8', 'paralel' => 'A', 'no_telp_wali' => '085678901234' ],
            [ 'id' => 4, 'nis' => '004', 'nama_siswa' => 'Dewi Anggraini', 'jenis_kelamin' => 'Perempuan', 'kelas' => '8', 'paralel' => 'B', 'no_telp_wali' => '087812345678' ],
        ];

        // Kemudian kirim data tersebut ke view
        return view('admin.siswa.index', compact('siswa'));
    }
}
