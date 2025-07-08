@extends('admin.layouts.app')

@section('content')

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>
<div class="row">

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="border-left: none;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; background-color: #9B59B6;">
                            <i class="fas fa-user fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-lg font-weight-bold text-gray-800 mb-1">Jumlah Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                    </div>
                </div>
                <div class="row no-gutters align-items-center mt-2">
                    <div class="col-auto text-success mr-1">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="col text-xs text-muted">Terdaftar</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="border-left: none;">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col-auto mr-3">
                        <div class="rounded-circle d-flex align-items-center justify-content-center"
                            style="width: 50px; height: 50px; background-color: #2ECC71;">
                            <i class="fas fa-star fa-2x text-white"></i>
                        </div>
                    </div>
                    <div class="col">
                        <div class="text-lg font-weight-bold text-gray-800 mb-1">Jumlah Kelas</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">25</div>
                    </div>
                </div>
                <div class="row no-gutters align-items-center mt-2">
                    <div class="col-auto text-muted mr-1">
                        <i class="fas fa-home"></i>
                    </div>
                    <div class="col text-xs text-muted">SMP AL-AZHAR</div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="border-left: none;">
            <div class="card-header py-3" style="background-color: #9B59B6; color: white;">
                <h6 class="m-0 font-weight-bold">Absensi Siswa Hari ini</h6>
                <div class="text-sm">19 Maret 2025</div>
            </div>
            <div class="card-body">
                <div class="row text-center">
                    <div class="col">
                        <div class="text-success text-sm font-weight-bold">Hadir</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                    <div class="col">
                        <div class="text-warning text-sm font-weight-bold">Sakit</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                    <div class="col">
                        <div class="text-primary text-sm font-weight-bold">Izin</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                    <div class="col">
                        <div class="text-danger text-sm font-weight-bold">Alfa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">30</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card shadow h-100 py-2" style="border-left: none;">
            <div class="card-header py-3" style="background-color: #9B59B6; color: white; height: 150px; display: flex; align-items: flex-end;">
                <img src="https://via.placeholder.com/200x100/9B59B6/FFFFFF?text=GRAPH" alt="Graph Placeholder" style="max-width: 100%; height: auto;">
            </div>
            <div class="card-body">
                <div class="text-lg font-weight-bold text-gray-800 mb-1">Tingkat Kehadiran Siswa</div>
                <div class="text-sm text-muted">Jumlah kehadiran siswa 7 hari terakhir</div>
                <div class="mt-2">
                    <a href="#" class="text-purple" style="color: #9B59B6;">
                        <i class="fas fa-eye"></i> Lihat data
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection