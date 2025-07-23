 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('admin/img/logo/logo-smp.png') }}" alt="Logo SMP" style="width: 50px; height: 30px;">
                </div>
                <div class="sidebar-brand-text mx-3" style="white-space: nowrap;">SMP AL AZHAR</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('admin/absensi*') ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('home') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Data Master
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::is('admin/absensi*') ? 'active' : '' }}">
    <a class="nav-link" href="{{ route('absensi.index') }}">
        <i class="fas fa-fw fa-folder"></i>
        <span>Data Absensi</span>
    </a>
</li>
                  <li class="nav-item {{ Request::is('admin/siswa*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('siswa.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Siswa</span>
                </a>
                    <li class="nav-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('kelas.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Kelas</span>
                </a>
                  <li class="nav-item {{ Request::is('admin/guru*') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('guru.index') }}">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Guru</span>
                </a>
                 <!-- <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Kelas</span>
                </a>
                  <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Data Pengguna</span>
                </a> -->
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Kirim Pesan</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Cetak Laporan</span>
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
                    aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Settings</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->