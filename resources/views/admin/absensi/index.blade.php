@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid mx-auto px-4 py-8"> {{-- Sesuaikan dengan struktur layout Anda --}}
        <h2 class="text-3xl font-bold mb-6 text-gray-800">Absensi Kehadiran</h2>

        <div class="card shadow mb-4 rounded-lg overflow-hidden">
            {{-- Header Card dengan Filter dan Tombol Tambah Data --}}
            <div class="card-header py-4 px-6 bg-blue-600 text-white flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0 md:space-x-4">
                <div class="flex flex-col">
                    <h6 class="m-0 font-weight-bold text-xl">Data Kehadiran</h6>
                    <span class="text-sm mt-1">Tahun Pelajaran : 2024/2025</span>
                </div>
                
                <div class="flex flex-wrap items-center space-x-4">
                    {{-- Filter Kelas --}}
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium">Kelas :</label>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="kelas_semua" class="form-checkbox h-4 w-4 text-blue-600 rounded">
                            <label for="kelas_semua" class="text-sm">Semua</label>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">VII</span>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">VIII</span>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">IX</span>
                        </div>
                    </div>

                    {{-- Filter Paralel --}}
                    <div class="flex items-center space-x-2">
                        <label class="text-sm font-medium">Paralel :</label>
                        <div class="flex items-center space-x-2">
                            <input type="checkbox" id="paralel_semua" class="form-checkbox h-4 w-4 text-blue-600 rounded">
                            <label for="paralel_semua" class="text-sm">Semua</label>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">A</span>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">B</span>
                            <span class="px-2 py-1 bg-blue-700 rounded-md text-xs font-semibold">C</span>
                        </div>
                    </div>

                    {{-- Filter Tanggal --}}
                    <div class="flex items-center space-x-2">
                        <label for="tanggal" class="text-sm font-medium">Tanggal :</label>
                        <input type="text" id="tanggal" value="15/04/2025" class="bg-blue-700 border border-blue-800 text-white text-sm rounded-md py-1 px-2 focus:ring-blue-500 focus:border-blue-500 w-28"> {{-- Menggunakan type="text" untuk format DD/MM/YYYY --}}
                        <i class="fas fa-calendar-alt text-white"></i> {{-- Icon kalender --}}
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
                {{-- Paginasi (jika menggunakan paginate() di controller) --}}
                <div class="mt-4">
                    {{ $siswa->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection