@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid"> {{-- Sesuaikan dengan struktur layout Anda --}}
        <h2>Data Pengguna</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Pengguna</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($pengguna)) {{-- Gunakan @if(empty($pengguna)) untuk array biasa --}}
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data pengguna.</td> {{-- colspan disesuaikan dengan jumlah kolom --}}
                                </tr>
                            @else
                                @foreach($pengguna as $key => $data)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data['username'] }}</td>
                                    <td>{{ $data['email'] }}</td>
                                    <td>
                                        <span class="badge {{ strtolower($data['role']) == 'admin' ? 'badge-primary' : (strtolower($data['role']) == 'guru' ? 'badge-info' : 'badge-secondary') }}">
                                            {{ $data['role'] }}
                                        </span>
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
