{{-- resources/views/adminabsensi/edit.blade.php --}}

@extends('layouts.app')

@section('content')
    <div class="container-fluid">
        <h2>Edit Data Absensi</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Form Edit Absensi</h6>
            </div>
            <div class="card-body">
                <form action="{{ route('absensi.update', $absensi['id']) }}" method="POST">
                    @csrf {{-- Token CSRF untuk keamanan Laravel --}}
                    @method('PUT') {{-- Method spoofing untuk HTTP PUT --}}

                    <div class="form-group">
                        <label for="nisn">Nisn:</label>
                        <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn', $absensi['nisn']) }}" required>
                        @error('nisn')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="nama_siswa">Nama Siswa:</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa', $absensi['nama_siswa']) }}" required>
                        @error('nama_siswa')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kelas">Kelas:</label>
                        <input type="text" class="form-control @error('kelas') is-invalid @enderror" id="kelas" name="kelas" value="{{ old('kelas', $absensi['kelas']) }}" required>
                        @error('kelas')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="paralel">Paralel:</label>
                        <input type="text" class="form-control @error('paralel') is-invalid @enderror" id="paralel" name="paralel" value="{{ old('paralel', $absensi['paralel']) }}" required>
                        @error('paralel')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="kehadiran">Kehadiran:</label>
                        <select class="form-control @error('kehadiran') is-invalid @enderror" id="kehadiran" name="kehadiran" required>
                            <option value="">Pilih Status Kehadiran</option>
                            <option value="Hadir" {{ old('kehadiran', $absensi['kehadiran']) == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                            <option value="Izin" {{ old('kehadiran', $absensi['kehadiran']) == 'Izin' ? 'selected' : '' }}>Izin</option>
                            <option value="Sakit" {{ old('kehadiran', $absensi['kehadiran']) == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                            <option value="Alpha" {{ old('kehadiran', $absensi['kehadiran']) == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                        </select>
                        @error('kehadiran')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jam_masuk">Jam Masuk (HH:MM):</label>
                        <input type="text" class="form-control @error('jam_masuk') is-invalid @enderror" id="jam_masuk" name="jam_masuk" value="{{ old('jam_masuk', $absensi['jam_masuk']) }}" placeholder="Contoh: 07:00">
                        @error('jam_masuk')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="jam_pulang">Jam Pulang (HH:MM):</label>
                        <input type="text" class="form-control @error('jam_pulang') is-invalid @enderror" id="jam_pulang" name="jam_pulang" value="{{ old('jam_pulang', $absensi['jam_pulang']) }}" placeholder="Contoh: 14:00">
                        @error('jam_pulang')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="keterangan">Keterangan:</label>
                        <textarea class="form-control" id="keterangan" name="keterangan" rows="3">{{ old('keterangan', $absensi['keterangan']) }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Update Data</button>
                    <a href="{{ route('admin.absensi.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@endsection
