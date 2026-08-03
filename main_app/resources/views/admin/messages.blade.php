<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesan Masuk SMANSA – SMAN 1 Tanjungpinang</title>
    
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Pesan & Pertanyaan Masuk</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Daftar seluruh pesan yang dikirimkan masyarakat / calon wali murid melalui formulir kontak.</p>
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

                <!-- Messages Table Card -->
                <div class="admin-card">
                    <div class="admin-table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Pengirim</th>
                                    <th>Subjek</th>
                                    <th>Isi Pesan Detail</th>
                                    <th>Tanggal Masuk</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $msg)
                                    <tr style="{{ !$msg->is_read ? 'background-color: rgba(212, 175, 55, 0.02);' : '' }}">
                                        <td data-label="Status">
                                            @if($msg->is_read)
                                                <span class="badge badge-success">Dibaca</span>
                                            @else
                                                <span class="badge badge-warning" style="box-shadow: 0 2px 5px rgba(245,158,11,0.25);">Baru</span>
                                            @endif
                                        </td>
                                        <td data-label="Pengirim">
                                            <strong style="color: var(--primary-dark);">{{ $msg->name }}</strong>
                                            <div style="font-size: 0.8rem; color: var(--text-muted); margin-top: 0.25rem;"><a href="mailto:{{ $msg->email }}" class="text-gold" style="text-decoration: underline;">{{ $msg->email }}</a></div>
                                        </td>
                                        <td data-label="Subjek"><strong style="color: var(--primary-dark);">{{ $msg->subject }}</strong></td>
                                        <td data-label="Isi Pesan Detail" style="font-size: 0.9rem; line-height: 1.5; color: #334155; padding: 1.5rem; max-width: 400px; word-break: break-word;">
                                            {{ $msg->message }}
                                        </td>
                                        <td data-label="Tanggal Masuk" style="font-size: 0.85rem; color: var(--text-muted);">{{ $msg->created_at->format('d M Y, H:i') }} WIB</td>
                                        <td data-label="Aksi" class="action-btns">
                                            @if(!$msg->is_read)
                                                <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-sm btn-edit" title="Tandai Sudah Dibaca"><i class="fa-solid fa-check-double"></i> Dibaca</button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini permanently?')">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-delete" title="Hapus"><i class="fa-solid fa-trash-can"></i> Haps</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 4rem; color: var(--text-muted);">
                                            <i class="fa-solid fa-envelope-open" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                                            <p>Belum ada pesan yang masuk.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="pagination-wrapper">
                        {{ $messages->links() }}
                    </div>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
