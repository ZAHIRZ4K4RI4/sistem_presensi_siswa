<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Kelas; // Jika Anda punya model Kelas

class KelasController extends Controller
{
    public function index()
    {
        // Di sinilah Anda akan mengambil data kelas dari database
        // Contoh data dummy untuk sementara:
        $kelas = [
            [
                'id' => 1,
                'wali_kelas' => 'Budi Santoso, S.Pd.',
                'tingkat_kelas' => '7',
                'paralel' => 'A',
                'no_telp_wali' => '081211223344',
                'foto_wali_kelas' => 'https://placehold.co/50x50/4CAF50/FFFFFF?text=BS' // Contoh URL foto
            ],
            [
                'id' => 2,
                'wali_kelas' => 'Siti Aminah, M.Pd.',
                'tingkat_kelas' => '7',
                'paralel' => 'B',
                'no_telp_wali' => '081355667788',
                'foto_wali_kelas' => 'https://placehold.co/50x50/2196F3/FFFFFF?text=SA' // Contoh URL foto
            ],
            [
                'id' => 3,
                'wali_kelas' => 'Joko Susilo, S.Kom.',
                'tingkat_kelas' => '8',
                'paralel' => 'A',
                'no_telp_wali' => '087899001122',
                'foto_wali_kelas' => '' // Contoh tanpa foto
            ],
            [
                'id' => 4,
                'wali_kelas' => 'Maria Ulfah, S.Pd.',
                'tingkat_kelas' => '8',
                'paralel' => 'B',
                'no_telp_wali' => '082133445566',
                'foto_wali_kelas' => 'https://placehold.co/50x50/FFC107/FFFFFF?text=MU'
            ],
        ];

        // Kemudian kirim data tersebut ke view
        return view('admin.kelas.index', compact('kelas'));
    }
}
