 <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    <img src="{{ asset('admin/img/logo/logo-smp.png') }}" alt="Logo SMP" style="width: 40px; height: 40px;">
                </div>
                <div class="sidebar-brand-text mx-3" style="white-space: nowrap;">SMP AL AZHAR</div>
            </a>


            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="index.html">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>



            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Heading -->
            <!-- <div class="sidebar-heading">
                Data Master
            </div> -->

            <!-- Nav Item - Pages Collapse Menu -->
            

            <!-- Nav Item - Utilities Collapse Menu -->
            <!-- <li class="nav-item">
    <a class="nav-link" href="dashboard.html"> <i class="fas fa-fw fa-tachometer-alt"></i> <span>Dashboard</span>
        <i class="fas fa-fw fa-chevron-right float-right"></i> </a>
</li> -->

<hr class="sidebar-divider">

<!-- <div class="sidebar-heading">
    DATA MASTER
</div> -->

<!-- <li class="nav-item">
    <a class="nav-link" href="data_absensi.html"> <i class="fas fa-fw fa-folder"></i>
        <span>Data Absensi</span>
        <i class="fas fa-fw fa-chevron-right float-right"></i> </a>
</li> -->
<!-- Nav Item - Data Absensi -->
    {{-- PASTIKAN INI admin.absensi.index --}}
    <li class="nav-item">
        <a class="nav-link" href="{{ route('absensi.index') }}">
            <i class="fas fa-clipboard-list"></i>
            <span>Data Absensi</span>
        </a>
    </li>
<li class="nav-item">
    <a class="nav-link" href="{{ route('siswa.index') }}"> 
        <i class="fas fa-clipboard-list"></i> 
        <span>Data Siswa</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('guru.index') }}"> 
        <i class="fas fa-clipboard-list"></i> 
        <span>Data Guru</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('kelas.index') }}"> 
        <i class="fas fa-clipboard-list"></i> 
        <span>Data Kelas</span>
    </a>
</li>

<li class="nav-item">
    <a class="nav-link" href="{{ route('pengguna.index') }}"> 
        <i class="fas fa-clipboard-list"></i> 
        <span>Data Pengguna</span>
    </a>
</li>



<!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider"> -->

            <!-- Divider -->
            <!-- <hr class="sidebar-divider d-none d-md-block"> -->

            <!-- Sidebar Toggler (Sidebar) -->
           
        </ul>
        <!-- End of Sidebar -->