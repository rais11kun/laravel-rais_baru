<?php

namespace App\Http\Controllers;

use App\Models\User; 
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('login-form');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
        // 1. Validasi Input (UBAH: dari 'username' menjadi 'email')
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3', // Aturan min:3 dari Anda
        ], [
            // Pesan validasi khusus
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal :min karakter.'
        ]);

        // Catatan: Aturan regex untuk huruf kapital dihilangkan dari validasi karena ini sebaiknya 
        // dicek di sisi front-end atau saat Register. Logika login fokus pada Auth.

        // 2. Cek apakah email ada di database
        $user = User::where('email', $request->email)->first();

        // 3. Cek User dan Password
        // Ketentuan: 
        // - Jika user ditemukan (email sama)
        // - Dan password yang diinput sama dengan password ter-hash di DB
        if ($user && Hash::check($request->password, $user->password)) {

            // 4. Login Berhasil: Membuat sesi login
            Auth::login($user); 
            $request->session()->regenerate();

            // Arahkan ke halaman Dashboard (nama view Anda: 'admin/dashboard')
            // Kita asumsikan Anda akan membuat route bernama 'admin.dashboard'
            return redirect()->intended(route('admin.dashboard'))->with('success', 'Login berhasil! Selamat datang, ' . $user->name);
        } else {
            // 5. Login Gagal: Kembali ke form login dengan error
            // Gunakan withErrors() agar pesan error bisa ditangkap di Blade
            return back()->withErrors([
                'email' => 'Email atau Password yang Anda masukkan salah.',
            ])->onlyInput('email'); // Hanya menyimpan input email yang lama
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
