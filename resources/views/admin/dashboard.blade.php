@extends('admin.app')

@section('title', 'Dashboard Admin')

@section('content')
    <h1 class="h3 mb-4 text-gray-800">Selamat Datang di Dashboard Admin</h1>
    <p>Halo, ini adalah halaman dashboard utama.</p>

    {{-- Contoh penggunaan data --}}
    <div class="card">
        <div class="card-body">
            Jumlah Pengguna: {{ $userAll->count() }}
        </div>
    </div>
@endsection
