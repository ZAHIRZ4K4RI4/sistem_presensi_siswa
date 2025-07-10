<?php

        namespace App\Http\Controllers;

        use Illuminate\Http\Request;
        // use App\Models\Guru; // Jika Anda punya model Guru

        class GuruController extends Controller
        {
            public function index()
            {
                // Di sinilah Anda akan mengambil data guru dari database
                // Contoh data dummy untuk sementara:
                $guru = [
                    [
                        'id' => 1,
                        'kode_guru' => 'G001',
                        'nama' => 'Budi Santoso, S.Pd.',
                        'jenis_kelamin' => 'Laki-laki',
                        'no_telepon' => '081211223344',
                        'foto' => 'https://placehold.co/50x50/4CAF50/FFFFFF?text=BS' // Contoh URL foto
                    ],
                    [
                        'id' => 2,
                        'kode_guru' => 'G002',
                        'nama' => 'Siti Aminah, M.Pd.',
                        'jenis_kelamin' => 'Perempuan',
                        'no_telepon' => '081355667788',
                        'foto' => 'https://placehold.co/50x50/2196F3/FFFFFF?text=SA' // Contoh URL foto
                    ],
                    [
                        'id' => 3,
                        'kode_guru' => 'G003',
                        'nama' => 'Joko Susilo, S.Kom.',
                        'jenis_kelamin' => 'Laki-laki',
                        'no_telepon' => '087899001122',
                        'foto' => '' // Contoh tanpa foto
                    ],
                ];

                // Kemudian kirim data tersebut ke view
                return view('admin.guru.index', compact('guru'));
            }
        }
        