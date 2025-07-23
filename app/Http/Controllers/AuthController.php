<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException; // Import ini untuk throw error

class AuthController extends Controller
{
    /**
     * Menampilkan formulir login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Menangani upaya login.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // Validasi data yang masuk
        $credentials = $request->validate([
            'username' => ['required', 'string'], // Validasi untuk username
            'password' => ['required', 'string'],
        ]);

        // Tambahkan 'remember' ke kredensial jika checkbox dicentang
        $remember = $request->boolean('remember');

        // Coba untuk mengotentikasi pengguna menggunakan 'username'
        // Auth::attempt() secara default mencari 'email' dan 'password'.
        // Untuk menggunakan 'username', kita harus secara eksplisit menentukannya.
        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']], $remember)) {
            $request->session()->regenerate(); // Regenerasi session untuk keamanan

            return redirect()->intended('/dashboard'); // Ganti dengan halaman setelah login berhasil
        }

        // Jika otentikasi gagal, kembalikan error
        // Gunakan ValidationException untuk menampilkan error di bawah input 'username'
        throw ValidationException::withMessages([
            'username' => trans('auth.failed'), // Menggunakan pesan error default Laravel untuk otentikasi gagal
        ]);
    }

    /**
     * Menangani proses logout.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout(); // Logout pengguna

        $request->session()->invalidate(); // Invalidasi session
        $request->session()->regenerateToken(); // Regenerasi token CSRF

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }
}
