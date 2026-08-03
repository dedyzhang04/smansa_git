<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Administrator – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon (Official SMAN 1 Tanjungpinang School Logo) -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
</head>
<body class="admin-login-body">

    <div class="admin-login-card">
        <div class="admin-login-header">
            <!-- Official School Logo -->
            <img src="{{ asset('images/logo.png') }}" alt="Logo SMAN 1 Tanjungpinang" style="width: 85px; height: 85px; margin: 0 auto 1.5rem auto; display: block; object-fit: contain; filter: drop-shadow(0 4px 8px rgba(0,0,0,0.15));">
            <h1>Portal SMANSA</h1>
            <p>SMA Negeri 1 Tanjungpinang</p>
        </div>

        <!-- Alert Validation Errors -->
        @if($errors->any())
            <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239, 68, 68, 0.1); border-color: rgba(239, 68, 68, 0.15); color: #ef4444;">
                <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first('login_error') ?: 'Gagal masuk. Silakan periksa kredensial Anda.' }}
            </div>
        @endif

        <form action="{{ route('admin.authenticate') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Alamat Email *</label>
                <input type="email" id="email" name="email" class="form-control" placeholder="admin@sman1-tpi.sch.id" value="{{ old('email') }}" required>
            </div>

            <div class="form-group" style="margin-bottom: 2.5rem;">
                <label for="password">Kata Sandi (Password) *</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; font-size: 1rem; padding: 0.9rem;">
                Masuk Sistem <i class="fa-solid fa-right-to-bracket"></i>
            </button>
        </form>
        
        <div style="text-align: center; margin-top: 2rem; font-size: 0.85rem; opacity: 0.7;">
            <a href="{{ route('home') }}" class="text-gold"><i class="fa-solid fa-arrow-left-long"></i> Kembali ke Beranda</a>
        </div>
    </div>

</body>
</html>
