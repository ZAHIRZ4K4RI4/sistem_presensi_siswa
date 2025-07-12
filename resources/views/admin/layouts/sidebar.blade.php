<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Custom styles for Inter font */
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom colors for the accents (from dashboard cards, kept for consistency) */
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
        /* Ensure canvas is responsive within its container (if any live charts were present) */
        canvas {
            max-width: 100%;
            height: auto;
        }
        /* Custom style for the card shadow (from dashboard cards, kept for consistency) */
        .card-shadow-custom {
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }

        /* Sidebar specific styling */
        .sidebar-dark {
            /* Blue background as per new image */
            background-color: #4e73df; /* Primary blue */
            background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%); /* Gradient for depth */
            color: #fff; /* White text for dark background */
            box-shadow: none; /* No shadow on the sidebar itself, it's flat blue as per image */
        }
        .sidebar-dark .sidebar-brand {
            color: #fff; /* White text for brand */
            border-bottom: 1px solid rgba(255, 255, 255, 0.15); /* Lighter separator line */
            padding-bottom: 1rem; /* Spacing below brand */
        }
        .sidebar-dark .nav-item .nav-link {
            color: #fff; /* Default link color (white) */
            padding: 0.75rem 1.5rem; /* Padding for menu items */
            display: flex;
            align-items: center;
            transition: background-color 0.2s ease-in-out, color 0.2s ease-in-out;
            font-size: 1rem; /* Increased font size for all menu items */
            border-radius: 0; /* No rounded corners for non-active links */
            margin: 0; /* No margin for non-active links */
        }
        .sidebar-dark .nav-item .nav-link i {
            color: #fff; /* Default icon color (white) */
            transition: color 0.2s ease-in-out;
        }
        .sidebar-dark .nav-item .nav-link.active {
            background-color: #2196F3; /* Solid blue background for active item as per image */
            color: #fff; /* White text for active item */
            border-radius: 0.5rem; /* Rounded corners for active item */
            margin: 0 1rem; /* Margin for active item to create floating effect */
            font-weight: bold; /* Make active link bold */
        }
        .sidebar-dark .nav-item .nav-link.active i {
            color: #fff; /* White icon for active item */
        }
        .sidebar-dark .nav-item .nav-link:hover:not(.active) {
            background-color: rgba(255, 255, 255, 0.1); /* Light transparent white on hover */
            color: #fff;
        }
        .sidebar-dark .nav-item .nav-link:hover:not(.active) i {
            color: #fff;
        }
        .sidebar-brand-text {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }
        .sidebar-brand-img {
            width: 80px;
            height: 80px;
            border-radius: 50%; /* Circular image */
            object-fit: cover;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1); /* Subtle shadow for profile pic */
        }
        .sidebar-divider {
            border-top: 1px solid rgba(255, 255, 255, 0.15); /* Lighter divider for dark background */
        }
        .sidebar-heading {
            color: rgba(255, 255, 255, 0.5); /* Lighter color for heading */
            font-size: 0.875rem; /* Increased font size for heading */
            font-weight: bold;
            text-transform: uppercase;
            padding: 1rem 1.5rem 0.5rem;
        }
        /* Adjustments for the main content area to account for sidebar width */
        .content-wrapper {
            flex-grow: 1;
            padding: 1.5rem; /* Equivalent to p-6 */
        }

        /* Responsive adjustments for sidebar */
        @media (max-width: 767px) {
            .sidebar {
                position: fixed;
                top: 0;
                left: -250px; /* Hidden by default on small screens */
                height: 100%;
                width: 250px;
                z-index: 1000;
                transition: left 0.3s ease;
            }
            .sidebar.toggled {
                left: 0;
            }
            .content-wrapper {
                margin-left: 0;
                transition: margin-left 0.3s ease;
            }
            .content-wrapper.toggled {
                margin-left: 250px;
            }
        }
    </style>
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body class="bg-gray-100 flex min-h-screen">

    <!-- Sidebar -->
    <ul class="flex flex-col bg-gradient-primary text-white w-64 min-h-screen shadow-lg py-4 sidebar sidebar-dark" id="accordionSidebar">

       <!-- Sidebar - Brand (Logo and School Name Section) -->
        <div class="flex flex-col items-center justify-center py-4 px-2 mb-4 border-b border-gray-200">
            <div class="mb-3">
                <!-- Logo image from your provided path -->
                <!-- IMPORTANT: In a real PHP framework (like Laravel/CodeIgniter),
                     you would use asset() helper: <img src="{{ asset('admin/img/logo-smp.png') }}" ... > -->
                <img src="admin/img/logo-smp.png" alt="Logo SMP" class="sidebar-brand-img">
            </div>
            <!-- School Name Text -->
            <div class="text-lg font-bold text-white text-center">SMP AL-AZHAR</div>
            <div class="text-lg font-bold text-white text-center">MUNCAR</div>
            <!-- <div class="text-sm text-gray-200 text-center">MUNCAR</div> -->
        </div>

        <!-- Nav Item - Absensi Siswa -->
        <!-- <li class="nav-item">
            <a class="nav-link" href="Dashboard.html">
                <i class="fas fa-fw fa-th-large mr-3"></i>
                <span>Dashboard</span>
            </a>
        </li> -->
    <li class="nav-item {{ Request::is('admin/absensi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-th-large mr-3"></i>
            <span>Dashboard</span>
        </a>
    </li>

        <!-- Nav Item - Data Siswa -->
        <!-- Nav Item - Absensi Siswa -->

    <li class="nav-item {{ Request::is('admin/absensi*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('absensi.index') }}">
            <i class="fas fa-fw fa-clipboard-check mr-3"></i>
            <span>Absensi Siswa</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/siswa*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('siswa.index') }}">
            <i class="fas fa-fw fa-user-graduate mr-3"></i>
            <span>Data Siswa</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/guru*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('guru.index') }}">
            <i class="fas fa-fw fa-chalkboard-teacher mr-3"></i>
            <span>Data Guru</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/kelas*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('kelas.index') }}">
            <i class="fas fa-fw fa-school mr-3"></i>
            <span>Data Kelas</span>
        </a>
    </li>

    <li class="nav-item {{ Request::is('admin/pengguna*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengguna.index') }}">
            <i class="fas fa-fw fa-users mr-3"></i>
            <span>Data Pengguna</span>
        </a>
    </li>
        
        

        <!-- Nav Item - Cetak Laporan -->
        <li class="nav-item">
            <a class="nav-link" href="cetak-laporan.html">
                <i class="fas fa-fw fa-print mr-3"></i>
                <span>Cetak Laporan</span>
            </a>
        </li>

        <!-- Nav Item - Kirim Pesan -->
        <li class="nav-item">
            <a class="nav-link" href="kirim-pesan.html">
                <i class="fas fa-fw fa-envelope mr-3"></i>
                <span>Kirim Pesan</span>
            </a>
        </li>

    </ul>
    <!-- End of Sidebar -->