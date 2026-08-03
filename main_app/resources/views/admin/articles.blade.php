<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Berita SMANSA – SMAN 1 Tanjungpinang</title>
    
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Kelola Berita & Pengumuman</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Terbitkan berita kegiatan akademis, OSIS, sarana prasarana, atau info PPDB sekolah.</p>
                </div>
                
                <div>
                    <a href="{{ route('admin.articles.create') }}" class="btn-accent"><i class="fa-solid fa-plus"></i> Tambah Berita Baru</a>
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

                <!-- Articles Manage Card -->
                <div class="admin-card">
                    <div class="admin-table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Sampul</th>
                                    <th>Judul Berita</th>
                                    <th>Kategori</th>
                                    <th>Slider</th>
                                    <th>Penulis</th>
                                    <th>Tanggal Rilis</th>
                                    <th style="width: 140px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($articles as $art)
                                    <tr>
                                        <td data-label="Sampul">
                                            <img src="{{ $art->image }}" alt="{{ $art->title }}" style="width: 80px; height: 50px; object-fit: cover; border-radius: 6px; border: 1px solid rgba(0,0,0,0.05);">
                                        </td>
                                        <td data-label="Judul Berita">
                                            <strong style="color: var(--primary-dark); font-size: 0.95rem;">{{ $art->title }}</strong>
                                            <div style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">slug: {{ $art->slug }}</div>
                                        </td>
                                        <td data-label="Kategori">
                                            <span class="badge badge-info">{{ $art->category }}</span>
                                        </td>
                                        <td data-label="Slider">
                                            @if($art->is_featured)
                                                <span class="badge" style="background-color: var(--accent-color); color: var(--primary-dark); font-weight: 700;"><i class="fa-solid fa-star"></i> Slider</span>
                                            @else
                                                <span class="badge" style="background-color: var(--text-muted); color: white; opacity: 0.65;">Mati</span>
                                            @endif
                                        </td>
                                        <td data-label="Penulis"><strong>{{ $art->author }}</strong></td>
                                        <td data-label="Tanggal Rilis" style="font-size: 0.85rem; color: var(--text-muted);">{{ \Carbon\Carbon::parse($art->published_at)->format('d M Y') }}</td>
                                        <td data-label="Aksi" class="action-btns">
                                            <!-- Quick Toggle Slider Status -->
                                            <form action="{{ route('admin.articles.toggle-featured', $art->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                <button type="submit" class="btn-sm" title="{{ $art->is_featured ? 'Hapus dari Slider' : 'Tampilkan di Slider' }}" style="background: {{ $art->is_featured ? 'var(--accent-color)' : 'rgba(100, 116, 139, 0.1)' }}; color: {{ $art->is_featured ? 'var(--primary-dark)' : 'var(--text-muted)' }}; border: none; padding: 0.45rem 0.65rem; border-radius: 6px; cursor: pointer; transition: var(--transition-smooth); display: inline-flex; align-items: center; justify-content: center;">
                                                    <i class="fa-solid fa-star"></i>
                                                </button>
                                            </form>
                                            
                                            <!-- Edit Article Action -->
                                            <a href="{{ route('admin.articles.edit', $art->id) }}" class="btn-sm" title="Edit Berita" style="background: rgba(11, 99, 197, 0.1); color: var(--primary-color); border: none; padding: 0.45rem 0.65rem; border-radius: 6px; cursor: pointer; transition: var(--transition-smooth); display: inline-flex; align-items: center; justify-content: center; text-decoration: none;">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                            
                                            <form action="{{ route('admin.articles.delete', $art->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-delete" title="Hapus Artikel" style="display: inline-flex; align-items: center; justify-content: center; padding: 0.45rem 0.65rem;"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 4rem; color: var(--text-muted);">
                                            <i class="fa-solid fa-newspaper" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                                            <p>Belum ada artikel berita yang dibuat.</p>
                                            <a href="{{ route('admin.articles.create') }}" class="btn-accent" style="margin-top: 1.5rem;"><i class="fa-solid fa-plus"></i> Buat Artikel Pertama</a>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="pagination-wrapper">
                        {{ $articles->links() }}
                    </div>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
