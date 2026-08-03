<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Pengguna Baru – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body>

    <div class="admin-layout">
        
        <!-- Sidebar Navigation -->
        <aside class="admin-sidebar">
            <div class="admin-logo">
                <h2>SMANSA</h2>
                <span>Portal SMANSA Admin</span>
            </div>
            
                                    <nav class="admin-nav">
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.dashboard') }}" class="admin-nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <i class="fa-solid fa-chart-line"></i> Dashboard
                </a>
                <a href="{{ route('admin.profile') }}" class="admin-nav-link {{ request()->routeIs('admin.profile') ? 'active' : '' }}">
                    <i class="fa-solid fa-graduation-cap"></i> Profil Sekolah
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin' || Session::get('admin_role') === 'writer')
                <a href="{{ route('admin.articles') }}" class="admin-nav-link {{ request()->routeIs('admin.articles*') ? 'active' : '' }}">
                    <i class="fa-solid fa-newspaper"></i> Kelola Berita
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.galleries') }}" class="admin-nav-link {{ request()->routeIs('admin.galleries*') ? 'active' : '' }}">
                    <i class="fa-solid fa-images"></i> Kelola Galeri
                </a>
                <a href="{{ route('admin.messages') }}" class="admin-nav-link {{ request()->routeIs('admin.messages*') ? 'active' : '' }}">
                    <i class="fa-solid fa-envelope"></i> Pesan Masuk
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin' || Session::get('admin_role') === 'ppdb')
                <a href="{{ route('admin.ppdb') }}" class="admin-nav-link {{ request()->routeIs('admin.ppdb*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-viewfinder"></i> Kelola PPDB
                </a>
                @endif
                
                @if(Session::get('admin_role') === 'admin')
                <a href="{{ route('admin.users') }}" class="admin-nav-link {{ request()->routeIs('admin.users*') ? 'active' : '' }}">
                    <i class="fa-solid fa-users-gear"></i> Kelola User
                </a>
                <a href="{{ route('admin.settings') }}" class="admin-nav-link {{ request()->routeIs('admin.settings*') ? 'active' : '' }}">
                    <i class="fa-solid fa-gears"></i> Pengaturan
                </a>
                @endif
                
                <div style="border-top: 1px solid rgba(255,255,255,0.05); margin: 2rem 0; padding-top: 2rem;"></div>
                
                <a href="{{ route('home') }}" class="admin-nav-link" target="_blank">
                    <i class="fa-solid fa-globe"></i> Lihat Website
                </a>
                <a href="{{ route('admin.logout') }}" class="admin-nav-link logout">
                    <i class="fa-solid fa-right-from-bracket"></i> Keluar (Logout)
                </a>
            </nav>
        </aside>

        <!-- Main Workspace -->
        <main class="admin-main">
            <!-- Header Bar -->
            <div class="admin-header-bar">
                <div>
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Daftarkan Pengguna Baru</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Mulai daftarkan akun baru untuk staf Humas atau Guru Penulis berita.</p>
                </div>
                
                <div>
                    <a href="{{ route('admin.users') }}" class="btn-primary" style="background-color: var(--text-muted); border-color: var(--text-muted);"><i class="fa-solid fa-arrow-left"></i> Kembali</a>
                </div>
            </div>

            <!-- Content Area -->
            <div class="admin-content">
                
                <div class="admin-card" style="max-width: 600px; margin: 0 auto;">
                    <form action="{{ route('admin.users.store') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="name">Nama Lengkap Pengguna *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap..." value="{{ old('name') }}" required>
                            @error('name')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Surel (Email) *</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="staff@sman1-tpi.sch.id" value="{{ old('email') }}" required>
                            @error('email')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">Hak Akses / Peran Akun *</label>
                            <select id="role" name="role" class="form-control" required style="-webkit-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill=%22%23044a27%22 height=%2224%22 viewBox=%220 0 24 24%22 width=%2224%22 xmlns=%22http://www.w3.org/2000/svg%22><path d=%22M7 10l5 5 5-5z%22/><path d=%22M0 0h24v24H0z%22 fill=%22none%22/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;">
                                <option value="writer" {{ old('role') === 'writer' ? 'selected' : '' }}>Writer (Hanya Mengelola Berita)</option>
                                <option value="ppdb" {{ old('role') === 'ppdb' ? 'selected' : '' }}>Panitia SPMB (Hanya Mengelola PPDB/SPMB)</option>
                                <option value="admin" {{ old('role') === 'admin' ? 'selected' : '' }}>Administrator (Akses Penuh Seluruh Menu)</option>
                            </select>
                            @error('role')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 2.5rem;">
                            <label for="password">Kata Sandi Akses (Password) *</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="••••••••" required>
                            <span style="font-size: 0.75rem; color: var(--text-muted); display: block; margin-top: 0.25rem;">Gunakan minimal 6 karakter kombinasi yang kuat.</span>
                            @error('password')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; font-size: 1rem; padding: 0.85rem;">
                            Daftarkan Akun Baru <i class="fa-solid fa-user-plus"></i>
                        </button>
                    </form>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
