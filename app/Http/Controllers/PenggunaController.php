<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\User; // Jika Anda punya model User/Pengguna

class PenggunaController extends Controller
{
    public function index()
    {
        // Di sinilah Anda akan mengambil data pengguna dari database
        // Contoh data dummy untuk sementara:
        $pengguna = [
            [
                'id' => 1,
                'username' => 'admin_smp',
                'email' => 'admin@smp.com',
                'role' => 'Admin'
            ],
            [
                'id' => 2,
                'username' => 'guru_budi',
                'email' => 'budi.santoso@smp.com',
                'role' => 'Guru'
            ],
            [
                'id' => 3,
                'username' => 'staff_tu',
                'email' => 'staff.tu@smp.com',
                'role' => 'Staff'
            ],
            [
                'id' => 4,
                'username' => 'admin_sistem',
                'email' => 'sistem@smp.com',
                'role' => 'Admin'
            ],
        ];

        // Perbaikan di sini: Ubah 'pengguna.index' menjadi 'admin.pengguna.index'
        // Karena folder 'pengguna' sekarang ada di dalam folder 'admin'
        return view('admin.pengguna.index', compact('pengguna'));
    }
}
