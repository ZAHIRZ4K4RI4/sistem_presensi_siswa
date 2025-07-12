<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Http\Request;
use Carbon\Carbon; // Impor Carbon untuk bekerja dengan waktu

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Mengambil data absensi, diurutkan terbaru dengan paginasi
        $siswa = Absensi::latest()->paginate(10);
        // Mengembalikan view index absensi dengan data siswa
        return view('admin.absensi.index', compact('siswa'));
    }

    /**
     * Show the form for creating a new resource.
     * Ini adalah metode yang hilang atau salah, yang menyebabkan error.
     */
    public function create()
    {
        // Mengembalikan view formulir untuk menambah data absensi
        return view('admin.absensi.create'); // Pastikan path view ini benar
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Aturan validasi yang diperbarui
        // 'jam_masuk' dan 'jam_pulang' tidak lagi 'required' dari input pengguna
        // karena akan diatur otomatis oleh sistem.
        $validatedData = $request->validate([
            'nisn' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'paralel' => 'required|string|max:255',
            'kehadiran' => 'required|string|in:Hadir,Sakit,Izin,Alpha',
            'keterangan' => 'nullable|string',
        ]);

        // Logika untuk mengisi jam_masuk secara otomatis dengan waktu saat ini
        $validatedData['jam_masuk'] = Carbon::now()->format('H:i');

        // Logika untuk mengisi jam_pulang secara otomatis dengan waktu saat ini
        // Asumsi: Jika diminta otomatis saat input, berarti jam pulang juga dicatat saat itu.
        $validatedData['jam_pulang'] = Carbon::now()->format('H:i');


        // Buat record Absensi baru dengan data yang sudah divalidasi dan ditambahkan waktu otomatis
        Absensi::create($validatedData);

        return redirect()->route('kehadiran.index')
                         ->with('success', 'Data absensi berhasil ditambahkan!');
    }

    // ... metode show, edit, update, destroy ...
}
