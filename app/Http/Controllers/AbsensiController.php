<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Models\Absensi; // Jika Anda punya model Absensi

class AbsensiController extends Controller
{
    // Method untuk menampilkan daftar absensi (sudah ada, tapi saya sertakan lagi)
    public function index()
    {
        // Di sinilah Anda akan mengambil data absensi dari database
        // Contoh data dummy yang sudah diperbarui dengan kolom baru
        $absensi = [
            [
                'id' => 1,
                'nisn' => '99887766',
                'nama_siswa' => 'Agus Setiawan',
                'kelas' => '7',
                'paralel' => 'A',
                'kehadiran' => 'Hadir',
                'jam_masuk' => '07:00',
                'jam_pulang' => '14:00',
                'keterangan' => '-'
            ],
            [
                'id' => 2,
                'nisn' => '99887767',
                'nama_siswa' => 'Budi Santoso',
                'kelas' => '7',
                'paralel' => 'B',
                'kehadiran' => 'Sakit',
                'jam_masuk' => '-',
                'jam_pulang' => '-',
                'keterangan' => 'Demam'
            ],
            [
                'id' => 3,
                'nisn' => '99887768',
                'nama_siswa' => 'Citra Dewi',
                'kelas' => '8',
                'paralel' => 'A',
                'kehadiran' => 'Izin',
                'jam_masuk' => '-',
                'jam_pulang' => '-',
                'keterangan' => 'Acara keluarga'
            ],
            [
                'id' => 4,
                'nisn' => '99887769',
                'nama_siswa' => 'Dewi Anggraini',
                'kelas' => '8',
                'paralel' => 'B',
                'kehadiran' => 'Alpha',
                'jam_masuk' => '-',
                'jam_pulang' => '-',
                'keterangan' => 'Tanpa keterangan'
            ],
            [
                'id' => 5,
                'nisn' => '99887766',
                'nama_siswa' => 'Agus Setiawan',
                'kelas' => '7',
                'paralel' => 'A',
                'kehadiran' => 'Hadir',
                'jam_masuk' => '07:05',
                'jam_pulang' => '14:00',
                'keterangan' => '-'
            ]
        ];

        return view('admin.absensi.index', compact('absensi'));
    }

    // Method untuk menampilkan form tambah data absensi
    public function create()
    {
        // Di sini Anda bisa mengirim data yang dibutuhkan untuk form (misal daftar siswa)
        // $siswa = Siswa::all();
        return view('admin.absensi.create'); // , compact('siswa')
    }

    // Method untuk menyimpan data absensi baru
    public function store(Request $request)
    {
        $request->validate([
            'nisn' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'paralel' => 'required|string|max:255',
            'kehadiran' => 'required|in:Hadir,Izin,Sakit,Alpha',
            'jam_masuk' => 'nullable|string|max:5',
            'jam_pulang' => 'nullable|string|max:5',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // TODO: Simpan data ke database
        // Absensi::create($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil ditambahkan!');
    }

    // Method untuk menampilkan form edit data absensi
    public function edit($id)
    {
        // TODO: Ambil data absensi berdasarkan ID dari database
        // $absensi = Absensi::findOrFail($id);
        // Contoh data dummy untuk edit:
        $absensi = [
            'id' => $id,
            'nisn' => '99887766',
            'nama_siswa' => 'Agus Setiawan',
            'kelas' => '7',
            'paralel' => 'A',
            'kehadiran' => 'Hadir',
            'jam_masuk' => '07:00',
            'jam_pulang' => '14:00',
            'keterangan' => '-'
        ]; // Ini hanya contoh, Anda harus mengambil dari database

        return view('absensi.edit', compact('absensi'));
    }

    // Method untuk memperbarui data absensi
    public function update(Request $request, $id)
    {
        $request->validate([
            'nisn' => 'required|string|max:255',
            'nama_siswa' => 'required|string|max:255',
            'kelas' => 'required|string|max:255',
            'paralel' => 'required|string|max:255',
            'kehadiran' => 'required|in:Hadir,Izin,Sakit,Alpha',
            'jam_masuk' => 'nullable|string|max:5',
            'jam_pulang' => 'nullable|string|max:5',
            'keterangan' => 'nullable|string|max:255',
        ]);

        // TODO: Perbarui data di database
        // $absensi = Absensi::findOrFail($id);
        // $absensi->update($request->all());

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil diperbarui!');
    }

    // Method untuk menghapus data absensi
    public function destroy($id)
    {
        // TODO: Hapus data dari database
        // Absensi::destroy($id);

        return redirect()->route('absensi.index')->with('success', 'Data absensi berhasil dihapus!');
    }

    // Method untuk memperbarui status kehadiran via AJAX
    public function updateKehadiran(Request $request, $id)
    {
        $request->validate([
            'kehadiran' => 'required|in:Hadir,Izin,Sakit,Alpha',
        ]);

        // TODO: Perbarui status kehadiran di database berdasarkan $id
        // $absensi = Absensi::findOrFail($id);
        // $absensi->kehadiran = $request->kehadiran;
        // $absensi->save();

        return response()->json(['success' => true, 'message' => 'Status kehadiran berhasil diperbarui.']);
    }
}
