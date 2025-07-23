<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Absensi Sekolah</title> {{-- Judul diubah sesuai permintaan --}}

    {{-- Vite directive untuk mengkompilasi aset CSS dan JS --}}
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        /* Mengatur gambar sebagai background untuk seluruh body */
        body {
            background-image: url("{{ asset('images/Absensi.jpg') }}"); /* Menggunakan gambar Absensi.jpg sebagai background */
            background-size: cover; /* Memastikan gambar menutupi seluruh area */
            background-position: center center; /* Menengahkan gambar */
            background-repeat: no-repeat; /* Mencegah gambar berulang */
            min-height: 100vh; /* Memastikan body mengambil tinggi penuh viewport */
            display: flex; /* Menggunakan flexbox untuk menengahkan konten */
            align-items: center; /* Menengahkan secara vertikal */
            justify-content: center; /* Menengahkan secara horizontal */
            overflow-x: hidden; /* Mencegah scroll horizontal */
            background-color: #f0f2f5; /* Warna latar belakang fallback jika gambar gagal dimuat */
        }

        /* Menyesuaikan container agar tidak ada padding berlebihan.
           Properti flexbox dipindahkan ke body untuk penengahan global. */
        .container-fluid {
            padding: 0;
            width: 100%;
            /* min-height: 100vh; dihapus karena body sudah menanganinya */
        }

        /* Styling untuk card/form login */
        .login-card {
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang semi-transparan untuk form */
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
            text-align: center;
            max-width: 450px; /* Batasi lebar form, sedikit lebih lebar untuk teks judul */
            width: 90%; /* Responsif */
            margin: auto; /* Memastikan card ditengahkan dalam kolomnya */
        }

        /* Styling untuk logo */
        .login-card .logo {
            max-width: 120px; /* Ukuran maksimum logo */
            height: auto;
            margin-bottom: 25px; /* Jarak antara logo dan judul */
        }

        .login-card h2 {
            font-size: 1.8rem;
            margin-bottom: 20px;
            color: #333;
            word-break: break-word; /* Memungkinkan kata panjang untuk pecah baris jika terlalu lebar */
        }

        .login-card .form-label {
            text-align: left;
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
            color: #555;
        }

        .login-card .form-control {
            border-radius: 8px;
            padding: 10px 15px;
            margin-bottom: 15px; /* Jarak antar input */
        }

        .login-card .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 1.1rem;
            margin-top: 10px;
        }

        .login-card .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }

        .login-card .register-link {
            display: block;
            margin-top: 20px;
            color: #007bff;
            text-decoration: none;
            font-size: 0.95rem;
        }

        .login-card .register-link:hover {
            text-decoration: underline;
        }

        /* Styling untuk pesan error validasi */
        .login-card .invalid-feedback {
            text-align: left;
            display: block; /* Pastikan error message tampil di bawah input */
            margin-top: -10px; /* Sesuaikan margin agar tidak terlalu jauh dari input */
            margin-bottom: 10px; /* Beri jarak ke elemen berikutnya */
        }

        /* Styling untuk alert error dari sesi */
        .login-card .alert-danger {
            text-align: left;
            margin-bottom: 20px;
            border-radius: 8px;
            font-size: 0.95rem;
        }

        /* Memastikan baris yang berisi kartu login mengambil lebar penuh dan tanpa margin default */
        .row.justify-content-center.align-items-center {
            width: 100%;
            margin: 0;
        }
    </style>
</head>
<body class="bg-body-tertiary">
    <div class="container-fluid p-0">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-12 col-md-6 col-lg-4"> {{-- Sesuaikan lebar kolom form agar lebih responsif --}}
                <div class="login-card">
                    {{-- Logo SMP --}}
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMP Al-Azhar Muncar" class="logo">

                    {{-- Judul Aplikasi --}}
                    <h2 class="fw-bold">SMP AL-AZHAR MUNCAR</h2>

                    {{-- Pesan error dari sesi (misal: login gagal) --}}
                    @if(session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Formulir Login -->
                    <form action="{{ route('login') }}" method="post">
                        @csrf {{-- Laravel CSRF Token untuk keamanan --}}

                        {{-- Input Field Username (diubah dari Email Address) --}}
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label> {{-- Label diubah --}}
                            <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus placeholder="Username Anda"> {{-- id, type, name, autocomplete diubah --}}

                            @error('username') {{-- Error handling untuk username --}}
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Input Field Password --}}
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Password Anda">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        {{-- Checkbox Remember Me --}}
                        <div class="mb-3 form-check text-start"> {{-- text-start untuk mensejajarkan checkbox ke kiri --}}
                            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>
                        </div>

                        {{-- Tombol Submit --}}
                        <button type="submit" class="btn btn-primary w-100">Log In</button> {{-- Teks tombol diubah --}}

                        {{-- Link Lupa Password --}}
                        @if (Route::has('password.request'))
                            <a class="btn btn-link mt-3 d-block text-center" href="{{ route('password.request') }}">
                                {{ __('Forgot Your Password?') }}
                            </a>
                        @endif
                    </form>

                    </a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
