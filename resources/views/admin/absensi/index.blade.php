{{-- resources/views/absensi/index.blade.php --}}

@extends('layouts.app') {{-- Pastikan ini sesuai dengan master layout Anda --}}

@section('content') {{-- Ini adalah section di mana konten utama Anda akan diletakkan --}}
    <div class="container-fluid">
        <h2>Data Absensi Siswa</h2>

        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex justify-content-between align-items-center">
                <h6 class="m-0 font-weight-bold text-primary">Daftar Absensi</h6>
                <div>
                    <a href="{{ route('admin.absensi.create') }}" class="btn btn-primary btn-sm mr-2">
                    <a href="#" class="btn btn-success btn-sm" target="_blank">
                        <i class="fas fa-file-pdf"></i> Cetak Laporan PDF
                    </a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nisn</th>
                                <th>Nama Siswa</th>
                                <th>Kelas</th>
                                <th>Paralel</th>
                                <th>Kehadiran</th>
                                <th>Jam Masuk</th>
                                <th>Jam Pulang</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(empty($absensi))
                                <tr>
                                    <td colspan="10" class="text-center">Tidak ada data absensi.</td>
                                </tr>
                            @else
                                @foreach($absensi as $key => $data)
                                <tr data-id="{{ $data['id'] }}"> {{-- Tambahkan data-id untuk identifikasi baris --}}
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $data['nisn'] }}</td>
                                    <td>{{ $data['nama_siswa'] }}</td>
                                    <td>{{ $data['kelas'] }}</td>
                                    <td>{{ $data['paralel'] }}</td>
                                    <td class="kehadiran-cell">
                                        <span class="badge status-{{ strtolower($data['kehadiran']) }}" data-kehadiran="{{ $data['kehadiran'] }}">
                                            {{ $data['kehadiran'] }}
                                        </span>
                                        {{-- Dropdown tersembunyi --}}
                                        <select class="form-control form-control-sm kehadiran-dropdown" style="display: none;">
                                            <option value="Hadir" {{ $data['kehadiran'] == 'Hadir' ? 'selected' : '' }}>Hadir</option>
                                            <option value="Izin" {{ $data['kehadiran'] == 'Izin' ? 'selected' : '' }}>Izin</option>
                                            <option value="Sakit" {{ $data['kehadiran'] == 'Sakit' ? 'selected' : '' }}>Sakit</option>
                                            <option value="Alpha" {{ $data['kehadiran'] == 'Alpha' ? 'selected' : '' }}>Alpha</option>
                                        </select>
                                    </td>
                                    <td>{{ $data['jam_masuk'] }}</td>
                                    <td>{{ $data['jam_pulang'] }}</td>
                                    <td>{{ $data['keterangan'] }}</td>
                                    <td>
                                        {{-- PASTIKAN INI admin.absensi.edit --}}
                                        <a href="{{ route('admin.absensi.edit', $data['id']) }}" class="btn btn-sm btn-info">Edit</a>

                                        {{-- Form untuk tombol Hapus --}}
                                        <form action="{{ route('admin.absensi.destroy', $data['id']) }}" method="POST" style="display:inline;">
                                            @csrf {{-- Token CSRF untuk keamanan Laravel --}}
                                            @method('DELETE') {{-- Method spoofing untuk HTTP DELETE --}}
                                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</button>
                                        </form>
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

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event listener untuk klik pada badge kehadiran
        document.querySelectorAll('.kehadiran-cell .badge').forEach(badge => {
            badge.addEventListener('click', function() {
                const cell = this.closest('.kehadiran-cell');
                const dropdown = cell.querySelector('.kehadiran-dropdown');
                const currentKehadiran = this.dataset.kehadiran;

                // Sembunyikan badge, tampilkan dropdown
                this.style.display = 'none';
                dropdown.style.display = 'block';
                dropdown.focus(); // Fokus ke dropdown agar bisa langsung dipilih

                // Set nilai dropdown sesuai dengan kehadiran saat ini
                dropdown.value = currentKehadiran;
            });
        });

        // Event listener untuk perubahan pada dropdown
        document.querySelectorAll('.kehadiran-dropdown').forEach(dropdown => {
            dropdown.addEventListener('change', function() {
                const selectedKehadiran = this.value;
                const cell = this.closest('.kehadiran-cell');
                const badge = cell.querySelector('.badge');
                const row = this.closest('tr');
                const absensiId = row.dataset.id; // Ambil ID absensi dari atribut data-id

                // Sembunyikan dropdown, tampilkan badge
                this.style.display = 'none';
                badge.style.display = 'inline-block';

                // Perbarui teks dan kelas badge
                badge.textContent = selectedKehadiran;
                badge.className = `badge status-${selectedKehadiran.toLowerCase()}`;
                badge.dataset.kehadiran = selectedKehadiran;

                // Kirim permintaan AJAX ke backend untuk menyimpan perubahan
                // PASTIKAN URL AJAX INI JUGA MENGGUNAKAN PREFIX admin
                fetch(`/admin/absensi/${absensiId}/update-kehadiran`, {
                    method: 'PUT',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}' // Penting untuk Laravel
                    },
                    body: JSON.stringify({ kehadiran: selectedKehadiran })
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Kehadiran berhasil diperbarui:', data.message);
                        // Opsional: Tampilkan notifikasi sukses
                    } else {
                        console.error('Gagal memperbarui kehadiran:', data.message);
                        // Opsional: Tampilkan notifikasi error
                        // Kembalikan ke nilai sebelumnya jika gagal
                        badge.textContent = badge.dataset.kehadiran;
                        badge.className = `badge status-${badge.dataset.kehadiran.toLowerCase()}`;
                    }
                })
                .catch(error => {
                    console.error('Terjadi kesalahan:', error);
                    // Kembalikan ke nilai sebelumnya jika ada error jaringan
                    badge.textContent = badge.dataset.kehadiran;
                    badge.className = `badge status-${badge.dataset.kehadiran.toLowerCase()}`;
                });
            });

            // Sembunyikan dropdown saat kehilangan fokus (klik di luar)
            dropdown.addEventListener('blur', function() {
                const cell = this.closest('.kehadiran-cell');
                const badge = cell.querySelector('.badge');
                this.style.display = 'none';
                badge.style.display = 'inline-block';
            });
        });
    });
</script>
@endpush
