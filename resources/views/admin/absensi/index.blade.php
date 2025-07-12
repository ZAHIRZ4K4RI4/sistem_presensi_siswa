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

                <div class="card-body table-responsive px-0">
                    <table class="table table-bordered table-hover align-middle text-sm mb-0">
                        <thead class="text-center table-light">
                            <tr>
                                <th>No</th>
                                <th>Nisn</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Paralel</th>
                                <th>Kehadiran</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Keterangan</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            <tr>
                                <td>1</td>
                                <td>4645637</td>
                                <td>Ahmad Adi</td>
                                <td>7</td>
                                <td>A</td>
                                <td><span class="badge bg-info text-white">Hadir</span></td>
                                <td>07:14:36</td>
                                <td>11:14:36</td>
                                <td>telat masuk</td>
                                <td>
                                    <button class="btn btn-sm btn-purple text-white px-2"><i class="fas fa-edit"></i>
                                        EDIT</button>
                                    <button class="btn btn-sm btn-danger px-2"><i class="fas fa-trash"></i> DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>4645637</td>
                                <td>Moh Yusuf</td>
                                <td>7</td>
                                <td>A</td>
                                <td><span class="badge bg-primary">Ijin</span></td>
                                <td>-</td>
                                <td>-</td>
                                <td>acara keluarga</td>
                                <td>
                                    <button class="btn btn-sm btn-purple text-white px-2"><i class="fas fa-edit"></i>
                                        EDIT</button>
                                    <button class="btn btn-sm btn-danger px-2"><i class="fas fa-trash"></i> DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>5276347</td>
                                <td>Andika Putra</td>
                                <td>7</td>
                                <td>A</td>
                                <td><span class="badge bg-warning text-dark">Sakit</span></td>
                                <td>-</td>
                                <td>-</td>
                                <td>sakit</td>
                                <td>
                                    <button class="btn btn-sm btn-purple text-white px-2"><i class="fas fa-edit"></i>
                                        EDIT</button>
                                    <button class="btn btn-sm btn-danger px-2"><i class="fas fa-trash"></i> DELETE</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>7586256</td>
                                <td>Diana Bela</td>
                                <td>7</td>
                                <td>A</td>
                                <td><span class="badge bg-danger">Alfa</span></td>
                                <td>-</td>
                                <td>-</td>
                                <td>alfa</td>
                                <td>
                                    <button class="btn btn-sm btn-purple text-white px-2"><i class="fas fa-edit"></i>
                                        EDIT</button>
                                    <button class="btn btn-sm btn-danger px-2"><i class="fas fa-trash"></i> DELETE</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <style>
            .btn-purple {
                background-color: #9c27b0;
            }

            .btn-purple:hover {
                background-color: #7b1fa2;
            }

            .badge {
                font-size: 0.75rem;
                padding: 6px 10px;
                border-radius: 10px;
            }
        </style>
    @endsection
