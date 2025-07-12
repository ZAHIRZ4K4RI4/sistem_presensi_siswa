@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid"> {{-- Sesuaikan dengan struktur layout Anda --}}
        <h2>Data Guru</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Guru</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Kode Guru</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>No. Telepon</th>
                                <th>Foto</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($guru)) {{-- Gunakan @if(empty($guru)) untuk array biasa --}}
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data guru.</td> {{-- colspan disesuaikan dengan jumlah kolom --}}
                                </tr>
                            @else
                                @foreach($guru as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data['kode_guru'] }}</td>
                                    <td>{{ $data['nama'] }}</td>
                                    <td>{{ $data['jenis_kelamin'] }}</td>
                                    <td>{{ $data['no_telepon'] }}</td>
                                    <td>
                                        @if($data['foto'])
                                            <img src="{{ $data['foto'] }}" alt="Foto {{ $data['nama'] }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        @else
                                            <img src="https://placehold.co/50x50/cccccc/333333?text=No+Photo" alt="No Photo" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="#" class="btn btn-sm btn-info">Edit</a>
                                        <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                                    </td>
                                </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
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
@endsection
