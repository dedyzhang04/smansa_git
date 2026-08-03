<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Galeri SMANSA – SMAN 1 Tanjungpinang</title>
    
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Kelola Galeri Sekolah</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Unggah foto upacara, praktikum lab, sarana prasarana, atau penyerahan piala prestasi.</p>
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

                <div class="admin-gallery-layout">
                    
                    <!-- Form: Add New Photo -->
                    <div class="admin-card">
                        <h3 style="font-size: 1.25rem; color: var(--primary-dark); margin-bottom: 1.5rem;"><i class="fa-solid fa-circle-plus text-gold"></i> Tambah Foto Baru</h3>
                        
                        <form action="{{ route('admin.galleries.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            
                            <div class="form-group">
                                <label for="title">Judul Foto *</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Upacara Bendera 2026..." value="{{ old('title') }}" required>
                                @error('title')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="category">Kategori *</label>
                                <select id="category" name="category" class="form-control" required style="-webkit-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill=%22%23044a27%22 height=%2224%22 viewBox=%220 0 24 24%22 width=%2224%22 xmlns=%22http://www.w3.org/2000/svg%22><path d=%22M7 10l5 5 5-5z%22/><path d=%22M0 0h24v24H0z%22 fill=%22none%22/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;">
                                    <option value="kegiatan" {{ old('category') === 'kegiatan' ? 'selected' : '' }}>Kegiatan Sekolah</option>
                                    <option value="fasilitas" {{ old('category') === 'fasilitas' ? 'selected' : '' }}>Sarana / Fasilitas</option>
                                    <option value="osis" {{ old('category') === 'osis' ? 'selected' : '' }}>OSIS / Kesiswaan</option>
                                    <option value="prestasi" {{ old('category') === 'prestasi' ? 'selected' : '' }}>Prestasi Siswa</option>
                                </select>
                                @error('category')
                                    <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="form-group" style="background-color: rgba(4,74,39,0.01); border: 1px dashed rgba(4,74,39,0.2); padding: 1.25rem; border-radius: 8px; margin-bottom: 2rem;">
                                <div class="form-group">
                                    <label for="image_file">Unggah File Foto</label>
                                    <input type="file" id="image_file" name="image_file" class="form-control" accept="image/*" style="padding: 0.5rem; border-color: rgba(100,116,139,0.15); background-color: transparent;">
                                    @error('image_file')
                                        <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div style="text-align: center; font-size: 0.8rem; font-weight: bold; color: var(--text-muted); margin: 0.5rem 0;">— ATAU —</div>
                                <div class="form-group" style="margin-bottom: 0;">
                                    <label for="image_url">URL Foto Kustom</label>
                                    <input type="url" id="image_url" name="image_url" class="form-control" placeholder="https://example.com/foto.jpg" value="{{ old('image_url') }}">
                                    @error('image_url')
                                        <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>

                            <button type="submit" class="btn-accent" style="width: 100%; justify-content: center; padding: 0.85rem;">
                                Unggah ke Galeri <i class="fa-solid fa-arrow-up-from-bracket"></i>
                            </button>
                        </form>
                    </div>

                    <!-- Photo List Grid -->
                    <div class="admin-card">
                        <h3 style="font-size: 1.25rem; color: var(--primary-dark); margin-bottom: 1.5rem;"><i class="fa-solid fa-photo-film text-gold"></i> Foto Galeri Saat Ini</h3>
                        
                        <div class="admin-photo-grid">
                            @forelse($galleries as $gal)
                                <div style="border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; overflow: hidden; background-color: var(--bg-light); display: flex; flex-direction: column;">
                                    <div style="position: relative; height: 160px;">
                                        <img src="{{ $gal->image }}" alt="{{ $gal->title }}" style="width: 100%; height: 100%; object-fit: cover;">
                                        <span class="badge badge-info" style="position: absolute; top: 0.75rem; left: 0.75rem; box-shadow: 0 4px 10px rgba(0,0,0,0.15);">{{ $gal->category }}</span>
                                    </div>
                                    <div style="padding: 1.25rem; display: flex; flex-direction: column; flex-grow: 1;">
                                        <strong style="font-size: 0.9rem; color: var(--primary-dark); flex-grow: 1;">{{ $gal->title }}</strong>
                                        <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 1rem; border-top: 1px solid rgba(0,0,0,0.05); padding-top: 0.75rem;">
                                            <span style="font-size: 0.75rem; color: var(--text-muted);">ID: #{{ $gal->id }}</span>
                                            <form action="{{ route('admin.galleries.delete', $gal->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus foto galeri ini?')">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-delete" style="padding: 0.3rem 0.75rem;"><i class="fa-solid fa-trash-can"></i> Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div style="grid-column: span 2; text-align: center; padding: 4rem; color: var(--text-muted);">
                                    <i class="fa-solid fa-images" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                                    <p>Belum ada foto galeri.</p>
                                </div>
                            @endforelse
                        </div>
                        
                        <!-- Pagination Links -->
                        <div class="pagination-wrapper" style="margin-top: 2rem;">
                            {{ $galleries->links() }}
                        </div>
                    </div>

                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
