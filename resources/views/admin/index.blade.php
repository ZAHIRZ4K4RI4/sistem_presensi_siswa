@extends('admin.layouts.app')

@section('content')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin Presensi Siswa</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for Inter font */
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom colors for the accents */
        .bg-purple-600 {
            background-color: #9B59B6;
        }
        .text-purple-600 {
            color: #9B59B6;
        }
        .hover\:bg-purple-700:hover {
            background-color: #8E44AD; /* Slightly darker purple on hover */
        }
        .bg-green-500 {
            background-color: #2ECC71;
        }
        .text-green-500 {
            color: #2ECC71;
        }
        /* Ensure canvas is responsive within its container */
        canvas {
            max-width: 100%;
            height: auto;
        }
        /* Custom style for the card shadow as seen in the image */
        .card-shadow-custom {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <!-- Chart.js CDN (still included for potential future use or if a live chart is desired elsewhere) -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-gray-100">

    <div class="container mx-auto p-6 md:p-8">
        <!-- Page Heading -->
        <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
           
            <!-- "Generate Report" button removed as per request to remove search/report feature -->
        </div>

        <!-- Dashboard Cards Row (2x2 layout as per image) -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 mb-6">

            <!-- Card: Jumlah Siswa -->
            <div class="bg-white rounded-lg card-shadow-custom p-6 h-full flex flex-col justify-between">
                <div class="flex items-center mb-4">
                    <div class="rounded-full flex items-center justify-center w-14 h-14 bg-purple-600 mr-4">
                        <i class="fas fa-user text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-lg font-bold text-gray-800 mb-1">Jumlah Siswa</div>
                        <div id="jumlahSiswa" class="text-3xl font-bold text-gray-00"></div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-gray-600 mt-2">
                    <i class="fas fa-check-circle text-green-500 mr-1"></i>
                    <span>Terdaftar</span>
                </div>
            </div>

            <!-- Card: Jumlah Kelas -->
            <div class="bg-white rounded-lg card-shadow-custom p-6 h-full flex flex-col justify-between">
                <div class="flex items-center mb-4">
                    <div class="rounded-full flex items-center justify-center w-14 h-14 bg-green-500 mr-4">
                        <i class="fas fa-star text-white text-2xl"></i>
                    </div>
                    <div>
                        <div class="text-lg font-bold text-gray-800 mb-1">Jumlah Kelas</div>
                        <div id="jumlahKelas" class="text-3xl font-bold text-gray-800"></div>
                    </div>
                </div>
                <div class="flex items-center text-sm text-gray-600 mt-2">
                    <i class="fas fa-home text-gray-400 mr-1"></i>
                    <span id="namaSekolah"></span>
                </div>
            </div>

            <!-- Card: Absensi Siswa Hari Ini -->
            <div class="bg-white rounded-lg card-shadow-custom h-full flex flex-col">
                <div class="bg-purple-600 text-white p-4 rounded-t-lg">
                    <h6 class="text-lg font-bold mb-1">Absensi Siswa Hari Ini</h6>
                    <div id="tanggalHariIniSiswa" class="text-sm"></div>
                </div>
                <div class="p-6 flex-grow">
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 text-center">
                        <div>
                            <div class="text-green-500 text-sm font-bold">Hadir</div>
                            <div id="hadirSiswa" class="text-xl font-bold text-gray-800"></div>
                        </div>
                        <div>
                            <div class="text-yellow-500 text-sm font-bold">Sakit</div>
                            <div id="sakitSiswa" class="text-xl font-bold text-gray-800"></div>
                        </div>
                        <div>
                            <div class="text-blue-500 text-sm font-bold">Izin</div>
                            <div id="izinSiswa" class="text-xl font-bold text-gray-800"></div>
                        </div>
                        <div>
                            <div class="text-red-500 text-sm font-bold">Alfa</div>
                            <div id="alfaSiswa" class="text-xl font-bold text-gray-800"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Card: Tingkat Kehadiran Siswa (with static graph image in header) -->
            <div class="bg-white rounded-lg card-shadow-custom h-full flex flex-col">
                <div class="bg-purple-600 p-4 rounded-t-lg flex items-center justify-center overflow-hidden" style="min-height: 150px; max-height: 150px;">
                    <!-- Placeholder image for the graph as seen in the screenshot -->
                    <img src="https://placehold.co/400x150/9B59B6/FFFFFF?text=GRAPH" alt="Graph Placeholder" class="w-full h-full object-cover">
                </div>
                <div class="p-6 flex-grow">
                    <h4 class="text-lg font-bold text-gray-800 mb-1">Tingkat Kehadiran Siswa</h4>
                    <p class="text-sm text-gray-600 mb-4">Jumlah kehadiran siswa 7 hari terakhir</p>
                    <div class="flex items-center text-sm">
                        <i class="fas fa-eye text-purple-600 mr-2"></i>
                        <a href="#" class="text-purple-600 hover:underline">Lihat data</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Note: The live chart for "Tingkat Kehadiran Siswa" is removed as per the image,
             which shows a static graph in the card header. If you need a live chart,
             you can re-add a separate section for it. -->

    </div>

    <script>
        // --- Simulated PHP Data (for demonstration purposes) ---
        // This data simulates what your PHP backend would provide.
        const simulatedData = {
            siswa: Array(25).fill(null), // Simulates count($siswa)
            guru: Array(10).fill(null),  // Simulates count($guru) - kept for data consistency, though not displayed
            kelas: Array(5).fill(null),  // Simulates count($kelas)
            petugas: Array(3).fill(null), // Simulates count($petugas) - kept for data consistency, though not displayed
            generalSettings: {
                school_name: "SMP AL-AZHAR"
            },
            dateNow: new Date().toLocaleDateString('id-ID', { day: 'numeric', month: 'long', year: 'numeric' }),
            jumlahKehadiranSiswa: {
                hadir: 30,
                sakit: 30,
                izin: 30,
                alfa: 30
            },
            // grafikKehadiranSiswa and dateRange are not strictly needed for the static image in the card header,
            // but kept here for completeness if you decide to add a live chart later.
            grafikKehadiranSiswa: [20, 22, 25, 23, 27, 24, 26], // Example data for a line chart
            dateRange: [] // Will be generated dynamically for chart labels
        };

        // Generate dateRange for the last 7 days (for chart labels if used)
        for (let i = 6; i >= 0; i--) {
            const d = new Date();
            d.setDate(d.getDate() - i);
            simulatedData.dateRange.push(d.toLocaleDateString('id-ID', { day: 'numeric', month: 'short' }));
        }

        // --- Populate HTML with Simulated Data ---
        document.addEventListener('DOMContentLoaded', function() {
            // Populate "Jumlah Siswa" card
            document.getElementById('jumlahSiswa').innerText = simulatedData.siswa.length;

            // Populate "Jumlah Kelas" card
            document.getElementById('jumlahKelas').innerText = simulatedData.kelas.length;
            document.getElementById('namaSekolah').innerText = simulatedData.generalSettings.school_name;

            // Populate "Absensi Siswa Hari Ini" card
            document.getElementById('tanggalHariIniSiswa').innerText = simulatedData.dateNow;
            document.getElementById('hadirSiswa').innerText = simulatedData.jumlahKehadiranSiswa.hadir;
            document.getElementById('sakitSiswa').innerText = simulatedData.jumlahKehadiranSiswa.sakit;
            document.getElementById('izinSiswa').innerText = simulatedData.jumlahKehadiranSiswa.izin;
            document.getElementById('alfaSiswa').innerText = simulatedData.jumlahKehadiranSiswa.alfa;

            // No specific JS needed for "Tingkat Kehadiran Siswa" card as it uses a static image.
            // If you later decide to add a live chart for "Tingkat Kehadiran Siswa"
            // outside the card header, you would initialize it here using Chart.js
            // similar to the previous version of the code.
        });
    </script>
</body>
</html>


@endsection