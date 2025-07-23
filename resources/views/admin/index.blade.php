@extends('admin.layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        {{-- <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a> --}}
    </div>

    <div class="row">

        {{-- Data Siswa --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-primary text-white shadow h-100 py-2"> {{-- Biru --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-white">11</div>
                            <div class="text-white font-weight-bold mb-1">Data Siswa</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-friends fa-4x text-white-50"></i> {{-- Ikon siswa --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-primary rounded-pill px-4">Lihat detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Guru --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-success text-white shadow h-100 py-2"> {{-- Hijau --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-white">10</div>
                            <div class="text-white font-weight-bold mb-1">Data Guru</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chalkboard-teacher fa-4x text-white-50"></i> {{-- Ikon guru --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-success rounded-pill px-4">Lihat detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Admin --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-warning text-white shadow h-100 py-2"> {{-- Kuning --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-white">2</div>
                            <div class="text-white font-weight-bold mb-1">Data Admin</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user-tie fa-4x text-white-50"></i> {{-- Ikon admin --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-warning rounded-pill px-4">Lihat detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Kelas --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card bg-danger text-white shadow h-100 py-2"> {{-- Merah --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-white">5</div>
                            <div class="text-white font-weight-bold mb-1">Data Kelas</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-door-open fa-4x text-white-50"></i> {{-- Ikon kelas --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-danger rounded-pill px-4">Lihat detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data Tahun Pelajaran --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-white shadow h-100 py-2" style="background-color: #1ABC9C;"> {{-- Tosca --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-white">1</div>
                            <div class="text-white font-weight-bold mb-1">Data Tahun Pelajaran</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-chart-bar fa-4x text-white-50"></i> {{-- Ikon grafik/tahun --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-info rounded-pill px-4" style="color: #1ABC9C !important;">Lihat detail <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Profil --}}
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card text-gray-800 shadow h-100 py-2" style="background-color: #ECF0F1;"> {{-- Abu-abu terang --}}
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2 text-center">
                            <div class="display-4 font-weight-bold text-gray-800"></div> {{-- Kosongkan angka --}}
                            <div class="text-gray-800 font-weight-bold mb-1">Profil</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-user fa-4x text-gray-500"></i> {{-- Ikon profil --}}
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col text-center">
                            <a href="#" class="btn btn-light btn-sm text-gray-800 rounded-pill px-4">Profil Saya <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection