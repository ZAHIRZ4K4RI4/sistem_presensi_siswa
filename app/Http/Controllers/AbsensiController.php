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
        // // Mengambil data absensi, diurutkan terbaru dengan paginasi
        // $siswa = Absensi::latest()->paginate(10);
        // // Mengembalikan view index absensi dengan data siswa
        return view('admin.absensi.index');
    }

    /**
     * Show the form for creating a new resource.
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

    /**
     * Display the specified resource.
     * Menampilkan detail satu data absensi.
     */
    public function show(Absensi $absensi)
    {
        return view('admin.absensi.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     * Menampilkan formulir untuk mengedit data absensi yang sudah ada.
     */
    public function edit(Absensi $absensi)
    {
        return view('admin.absensi.edit', compact('absensi'));
    }

    /**
     * Update the specified resource in storage.
     * Memperbarui data absensi yang sudah ada di database.
     */
    public function update(Request $request, Absensi $absensi)
    {
        $validatedData = $request->validate([
            'nisn' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'paralel' => 'required|string|max:255',
            'kehadiran' => 'required|string|in:Hadir,Sakit,Izin,Alpha',
            // Jika jam_masuk dan jam_pulang bisa diedit manual, tambahkan validasinya di sini
            // 'jam_masuk' => 'required|date_format:H:i',
            // 'jam_pulang' => 'nullable|date_format:H:i',
            'keterangan' => 'nullable|string',
        ]);

        $absensi->update($validatedData);

        return redirect()->route('absensi.index')
                         ->with('success', 'Data absensi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     * Menghapus data absensi dari database.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('kehadiran.index')
                         ->with('success', 'Data absensi berhasil dihapus!');
    }
}
