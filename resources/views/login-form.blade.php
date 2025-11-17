<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - NamaProyek</title>

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        /* ... (CSS Anda sebelumnya) ... */
        body {
            background: linear-gradient(135deg, #4e73df, #224abe);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Poppins', sans-serif;
        }

        .login-card {
            background: #fff;
            border-radius: 20px;
            padding: 2.5rem;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-15px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .btn-login {
            background-color: #4e73df;
            border: none;
            font-weight: bold;
        }

        .btn-login:hover {
            background-color: #2e59d9;
        }

        .error-text {
            color: red;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div class="login-card">
        <h3 class="text-center mb-4 text-primary fw-bold">Login ke Akun Anda</h3>

        {{-- Pesan Error (dari session('error') atau withErrors()) --}}
        {{-- Kita gunakan $errors->any() untuk menampilkan error umum dari withErrors() --}}
        @if (session('error'))
            <div class="alert alert-danger text-center">
                {{ session('error') }}
            </div>
        @endif

        @if ($errors->any() && !session('error'))
            {{-- Tampilkan error validasi non-field-spesific, atau saat login gagal --}}
            <div class="alert alert-danger text-center">
                Email atau Password yang Anda masukkan salah.
            </div>
        @endif
        
        {{-- Pesan Sukses --}}
        @if (session('success'))
            <div class="alert alert-success text-center">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ url('/auth/login') }}" method="POST">
            @csrf
            <div class="mb-3">
                {{-- **UBAH: Menggunakan 'Email' sebagai label** --}}
                <label for="email" class="form-label">Email</label>
                {{-- **UBAH: Menggunakan 'email' sebagai name** --}}
                <input type="email" name="email" id="email" class="form-control"
                    placeholder="Masukkan email" value="{{ old('email') }}">
                @error('email')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder="Masukkan password">
                @error('password')
                    <span class="error-text">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-login w-100 text-white py-2">Login</button>
        </form>

        <p class="text-center mt-3 text-muted">
            Belum punya akun? <a href="#" class="text-primary">Daftar di sini</a>
        </p>
    </div>

    {{-- Bootstrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>