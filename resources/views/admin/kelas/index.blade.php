{{-- resources/views/kelas/index.blade.php --}}

@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid"> {{-- Sesuaikan dengan struktur layout Anda --}}
        <h2>Data Kelas</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Kelas</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Wali Kelas</th>
                                <th>Tingkat Kelas</th>
                                <th>Paralel</th>
                                <th>No Telp Wali</th>
                                <th>Foto Wali Kelas</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($kelas)) {{-- Gunakan @if(empty($kelas)) untuk array biasa --}}
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada data kelas.</td> {{-- colspan disesuaikan dengan jumlah kolom --}}
                                </tr>
                            @else
                                @foreach($kelas as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data['wali_kelas'] }}</td>
                                    <td>{{ $data['tingkat_kelas'] }}</td>
                                    <td>{{ $data['paralel'] }}</td>
                                    <td>{{ $data['no_telp_wali'] }}</td>
                                    <td>
                                        @if($data['foto_wali_kelas'])
                                            <img src="{{ $data['foto_wali_kelas'] }}" alt="Foto {{ $data['wali_kelas'] }}" class="img-thumbnail" style="width: 50px; height: 50px; object-fit: cover; border-radius: 5px;">
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
@endsection
