@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content')
    <div class="container mt-4">
        <div class="card-body table-responsive px-0">
            <h3 class="fw-bold px-1 pt-2 mb-3">Absensi Kehadiran</h3>
            <div class="card border-0 shadow-sm">
                <div class="card-header" style="background-color: #2196f3; color: white;">
                    <div
                        class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center">
                        <div>
                            <h5 class="mb-1 fw-bold">Data Kehadiran</h5>
                            <small>Tahun Pelajaran : 2024/2025</small>
                        </div>

                        <div class="mt-3 mt-md-0 d-flex flex-wrap align-items-center gap-3">
                            <div>
                                <label class="form-label mb-0 me-1 fw-semibold">Kelas :</label>
                                <div class="btn-group btn-group-sm" role="group">
                                    <input type="checkbox" class="btn-check" id="kelas_semua">
                                    <label class="btn btn-outline-light py-0 px-2" for="kelas_semua">Semua</label>
                                    <span class="badge bg-primary">VII</span>
                                    <span class="badge bg-primary">VIII</span>
                                    <span class="badge bg-primary">IX</span>
                                </div>
                            </div>

                            <div>
                                <label class="form-label mb-0 me-1 fw-semibold">Paralel :</label>
                                <div class="btn-group btn-group-sm" role="group">
                                    <input type="checkbox" class="btn-check" id="paralel_semua">
                                    <label class="btn btn-outline-light py-0 px-2" for="paralel_semua">Semua</label>
                                    <span class="badge bg-primary">A</span>
                                    <span class="badge bg-primary">B</span>
                                    <span class="badge bg-primary">C</span>
                                </div>
                            </div>

                            <div>
                                <label class="form-label mb-0 me-2 fw-semibold">Tanggal :</label>
                                <div class="input-group input-group-sm">
                                    <input type="text" class="form-control bg-primary text-white border-0"
                                        value="15/04/2025">
                                    <span class="input-group-text bg-primary text-white border-0">
                                        <i class="fas fa-calendar-alt"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="mt-3">
                            <button class="btn btn-light text-primary fw-bold px-4">
                                <i class="fas fa-plus"></i> Tambah Data
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Tombol Cetak Laporan dan Tambah Data --}}
                <div class="flex items-center space-x-3">
                    <button onclick="window.print()" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-md shadow-md">
                        Cetak Laporan
                    </button>
                    <a href="{{ route('absensi.create') }}" class="bg-blue-800 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded-md shadow-md flex items-center space-x-2">
                        <i class="fas fa-plus"></i>
                        <span>Tambah Data</span>
                    </a>
                </div>
            </div>

            <div class="card-body p-6">
                <div class="table-responsive">
                    <table class="table min-w-full leading-normal border-collapse text-sm" id="dataTable" width="100%" cellspacing="0"> {{-- Menambahkan text-sm untuk ukuran font tabel --}}
                        <thead>
                            <tr>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tl-lg"> {{-- Mengurangi padding px-3 py-2 --}}
                                    No
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nisn
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Nama Siswa
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kelas
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Paralel
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Kehadiran
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Jam Masuk
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Jam Pulang
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                                    Keterangan
                                </th>
                                <th class="px-3 py-2 border-b-2 border-gray-200 bg-gray-100 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider rounded-tr-lg">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($siswa as $key => $data)
                                <tr>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm"> {{-- Mengurangi padding px-3 py-2 --}}
                                        {{ $key + 1 }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['nisn'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['nama_siswa'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['kelas'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['paralel'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        @php
                                            $kehadiranClass = '';
                                            switch($data['kehadiran'] ?? '') {
                                                case 'Hadir': $kehadiranClass = 'bg-green-500'; break;
                                                case 'Izin': $kehadiranClass = 'bg-blue-500'; break;
                                                case 'Sakit': $kehadiranClass = 'bg-yellow-500'; break;
                                                case 'Alpha': $kehadiranClass = 'bg-red-500'; break;
                                                default: $kehadiranClass = 'bg-gray-400'; break;
                                            }
                                        @endphp
                                        <span class="inline-block px-2 py-1 text-white text-xs font-semibold rounded-full {{ $kehadiranClass }}"> {{-- Mengurangi padding px-2 py-1 --}}
                                            {{ $data['kehadiran'] ?? '-' }}
                                        </span>
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['jam_masuk'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['jam_pulang'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm">
                                        {{ $data['keterangan'] ?? '-' }}
                                    </td>
                                    <td class="px-3 py-2 border-b border-gray-200 bg-white text-sm whitespace-nowrap">
                                        <a href="#" class="inline-flex items-center px-2 py-1 bg-purple-600 hover:bg-purple-700 text-white text-xs font-bold rounded-md shadow-sm mr-2"> {{-- Mengubah warna Edit menjadi ungu --}}
                                            <i class="fas fa-edit mr-1"></i> Edit
                                        </a>
                                        <a href="#" class="inline-flex items-center px-2 py-1 bg-red-600 hover:bg-red-700 text-white text-xs font-bold rounded-md shadow-sm"> {{-- Mengubah warna Delete menjadi merah --}}
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10" class="px-3 py-2 border-b border-gray-200 bg-white text-sm text-center text-gray-500">
                                        Tidak ada data siswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection