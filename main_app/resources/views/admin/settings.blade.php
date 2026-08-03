<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan Umum – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Pengaturan Sistem</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Konfigurasi Kop Surat resmi dan logo sekolah untuk dokumen administrasi.</p>
                </div>
                
                <div class="admin-user-profile">
                    <div class="admin-avatar">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div style="text-align: left;">
                        <h4 style="font-size: 0.9rem; color: var(--primary-dark); font-weight: 700;">{{ Session::get('admin_name', 'Humas Admin') }}</h4>
                        <p style="font-size: 0.75rem; color: var(--text-muted);">{{ Session::get('admin_email', 'admin@smansa-tpi.sch.id') }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="admin-content">
                
                <!-- Alert Feedback messages -->
                @if(Session::has('success'))
                    <div class="alert alert-success" style="margin-bottom: 2rem;">
                        <i class="fa-solid fa-circle-check"></i> {{ Session::get('success') }}
                    </div>
                @endif

                @if($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239,68,68,0.05); border-color: rgba(239,68,68,0.15); color: #ef4444;">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
                    </div>
                @endif

                <div class="admin-card" style="max-width: 800px; margin: 0 auto; padding: 2rem;">
                    <h2 style="font-size: 1.2rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1.5rem; border-bottom: 2px solid #edf2f7; padding-bottom: 0.5rem;"><i class="fa-solid fa-file-invoice text-gold"></i> Konfigurasi Kop Surat Resmi</h2>
                    
                    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label for="kop_header_1" style="font-weight: 700; font-size: 0.85rem; display: block; margin-bottom: 0.35rem;">Header Baris 1 (Instansi Atas)</label>
                            <input type="text" id="kop_header_1" name="kop_header_1" class="form-control" value="{{ old('kop_header_1', $settings['kop_header_1']) }}" required placeholder="Contoh: PEMERINTAH PROVINSI KEPULAUAN RIAU">
                            <span style="font-size: 0.75rem; color: var(--text-muted);">Biasanya berupa nama dinas atau pemerintah daerah tingkat atas.</span>
                        </div>

                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label for="kop_header_2" style="font-weight: 700; font-size: 0.85rem; display: block; margin-bottom: 0.35rem;">Header Baris 2 (Nama Sekolah / Lembaga)</label>
                            <input type="text" id="kop_header_2" name="kop_header_2" class="form-control" value="{{ old('kop_header_2', $settings['kop_header_2']) }}" required placeholder="Contoh: SMA NEGERI 1 TANJUNGPINANG">
                            <span style="font-size: 0.75rem; color: var(--text-muted);">Ditampilkan dengan ukuran huruf besar dan tebal (bold).</span>
                        </div>

                        <div class="form-group" style="margin-bottom: 1.25rem;">
                            <label for="kop_address" style="font-weight: 700; font-size: 0.85rem; display: block; margin-bottom: 0.35rem;">Alamat Lembaga</label>
                            <input type="text" id="kop_address" name="kop_address" class="form-control" value="{{ old('kop_address', $settings['kop_address']) }}" required placeholder="Contoh: Jalan K.H. Agus Salim No. 1 | Telp: ...">
                            <span style="font-size: 0.75rem; color: var(--text-muted);">Alamat fisik, nomor telepon, dan alamat email resmi sekolah.</span>
                        </div>

                        <div class="form-group" style="margin-bottom: 1.5rem;">
                            <label for="kop_website" style="font-weight: 700; font-size: 0.85rem; display: block; margin-bottom: 0.35rem;">Informasi Tambahan (Website & Akreditasi)</label>
                            <input type="text" id="kop_website" name="kop_website" class="form-control" value="{{ old('kop_website', $settings['kop_website']) }}" required placeholder="Contoh: Website: smansa-tpi.sch.id | Akreditasi A">
                            <span style="font-size: 0.75rem; color: var(--text-muted);">Informasi website resmi, status akreditasi, atau kode pos.</span>
                        </div>

                        <!-- Logo Upload Section -->
                        <div style="border: 1px solid #edf2f7; border-radius: 8px; padding: 1.5rem; background-color: #f8fafc; margin-bottom: 2rem; display: grid; grid-template-columns: 1fr 1fr; gap: 1.5rem;">
                            
                            <!-- Left Logo -->
                            <div style="border-right: 1px solid #e2e8f0; padding-right: 1.5rem;">
                                <h3 style="font-size: 0.95rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1rem;"><i class="fa-solid fa-image text-gold"></i> Logo Kiri (Contoh: Pemda / Tut Wuri)</h3>
                                <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                    <div style="width: 80px; height: 80px; border: 1.5px solid #cbd5e1; border-radius: 8px; background-color: #fff; display: flex; align-items: center; justify-content: center; padding: 0.5rem; flex-shrink: 0;">
                                        <img id="logo-left-preview" src="{{ asset($settings['kop_logo_left']) }}" alt="Logo Kiri" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    </div>
                                    <div style="flex: 1; min-width: 180px;">
                                        <input type="file" id="kop_logo_left_file" name="kop_logo_left_file" accept="image/*" class="form-control" style="padding: 0.45rem; font-size: 0.85rem; border: 1.5px solid #cbd5e1; border-radius: 6px; background-color: #fff; width: 100%;">
                                    </div>
                                </div>
                            </div>

                            <!-- Right Logo -->
                            <div style="padding-left: 0.5rem;">
                                <h3 style="font-size: 0.95rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1rem;"><i class="fa-solid fa-image text-gold"></i> Logo Kanan (Contoh: Logo Sekolah)</h3>
                                <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                    <div style="width: 80px; height: 80px; border: 1.5px solid #cbd5e1; border-radius: 8px; background-color: #fff; display: flex; align-items: center; justify-content: center; padding: 0.5rem; flex-shrink: 0;">
                                        <img id="logo-right-preview" src="{{ asset($settings['kop_logo_right']) }}" alt="Logo Kanan" style="max-width: 100%; max-height: 100%; object-fit: contain;">
                                    </div>
                                    <div style="flex: 1; min-width: 180px;">
                                        <input type="file" id="kop_logo_right_file" name="kop_logo_right_file" accept="image/*" class="form-control" style="padding: 0.45rem; font-size: 0.85rem; border: 1.5px solid #cbd5e1; border-radius: 6px; background-color: #fff; width: 100%;">
                                    </div>
                                </div>
                            </div>

                        </div>

                        <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; font-size: 1rem; padding: 0.85rem; border: none; font-weight: 700; cursor: pointer; color: #fff;">
                            <i class="fa-solid fa-floppy-disk"></i> Simpan Semua Pengaturan
                        </button>
                    </form>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        // Realtime left logo preview
        document.getElementById('kop_logo_left_file').addEventListener('change', function(e) {
            const preview = document.getElementById('logo-left-preview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });

        // Realtime right logo preview
        document.getElementById('kop_logo_right_file').addEventListener('change', function(e) {
            const preview = document.getElementById('logo-right-preview');
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    preview.src = event.target.result;
                }
                reader.readAsDataURL(file);
            }
        });
    </script>
</body>
</html>
