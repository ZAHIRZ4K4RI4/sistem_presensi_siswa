
        <!-- Content Wrapper -->
        <div class="content-wrapper">
            <!-- Page Heading -->
            <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between mb-6">
                <h1 class="text-3xl font-bold text-gray-800 mb-4 sm:mb-0">Dashboard</h1>
                <!-- "Generate Report" button removed as per image -->
            </div>

            <!-- Dashboard Cards Row (2x2 layout as per image) -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2 xl:grid-cols-2 gap-6 mb-6 main-content">

                <!-- Card: Jumlah Siswa -->
                <div class="bg-white rounded-lg card-shadow-custom p-6 h-full flex flex-col justify-between">
                    <div class="flex items-center mb-4">
                        <!-- Changed bg-purple-600 to bg-blue-600 -->
                        <div class="rounded-full flex items-center justify-center w-14 h-14 bg-blue-600 mr-4">
                            <i class="fas fa-user text-white text-2xl"></i>
                        </div>
                        <div>
                            <div class="text-lg font-bold text-gray-800 mb-1">Jumlah Siswa</div>
                            <div id="jumlahSiswa" class="text-3xl font-bold text-gray-800"></div>
                        </div>
                    </div>
                    <div class="flex items-center text-sm text-gray-600 mt-2">
                        <i class="fas fa-check-circle text-green-500 mr-1"></i>
                        <span>Terdaftar</span>
                    </div>
                </div>

                <!-- Card: Jumlah Kelas (already green, no change) -->
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
                    <!-- Changed bg-purple-600 to bg-blue-600 -->
                    <div class="bg-blue-600 text-white p-4 rounded-t-lg">
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
                    <!-- Changed bg-purple-600 to bg-blue-600 -->
                    <div class="bg-blue-600 p-4 rounded-t-lg flex items-center justify-center overflow-hidden" style="min-height: 150px; max-height: 150px;">
                        <!-- Placeholder image for the graph, changed background to blue -->
                        <img src="https://placehold.co/400x150/4e73df/FFFFFF?text=GRAPH" alt="Graph Placeholder" class="w-full h-full object-cover">
                    </div>
                    <div class="p-6 flex-grow">
                        <h4 class="text-lg font-bold text-gray-800 mb-1">Tingkat Kehadiran Siswa</h4>
                        <p class="text-sm text-gray-600 mb-4">Jumlah kehadiran siswa 7 hari terakhir</p>
                        <div class="flex items-center text-sm">
                            <!-- Changed text-purple-600 to text-blue-600 -->
                            <i class="fas fa-eye text-blue-600 mr-2"></i>
                            <a href="#" class="text-blue-600 hover:underline">Lihat data</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Dashboard Cards Row -->