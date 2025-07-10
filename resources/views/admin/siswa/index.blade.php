{{-- resources/views/siswa/index.blade.php --}}

@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid"> {{-- Sesuaikan dengan struktur layout Anda --}}
        <h2>Data Siswa</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Siswa</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIS</th>
                                <th>Nama Siswa</th>
                                <th>Jenis Kelamin</th>
                                <th>Kelas</th>
                                <th>Paralel</th>
                                <th>No Telp Wali</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- Perbaikan di sini: Gunakan @if(empty($siswa)) untuk array biasa --}}
                            @if(empty($siswa))
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada data siswa.</td>
                                </tr>
                            @else
                                @foreach($siswa as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data['nis'] }}</td>
                                    <td>{{ $data['nama_siswa'] }}</td>
                                    <td>{{ $data['jenis_kelamin'] }}</td>
                                    <td>{{ $data['kelas'] }}</td>
                                    <td>{{ $data['paralel'] }}</td> {{-- Ini sekarang akan ditemukan --}}
                                    <td>{{ $data['no_telp_wali'] }}</td> {{-- Ini sekarang akan ditemukan --}}
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
@endsection
