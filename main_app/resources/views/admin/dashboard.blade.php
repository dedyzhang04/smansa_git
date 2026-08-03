<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon (Official SMAN 1 Tanjungpinang School Logo) -->
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Ringkasan Statistik</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Selamat datang kembali di panel administrasi SMAN 1 Tanjungpinang.</p>
                </div>
                
                <div class="admin-user-profile">
                    <div class="admin-avatar">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div style="text-align: left;">
                        <h4 style="font-size: 0.9rem; color: var(--primary-dark); font-weight: 700;">{{ Session::get('admin_name', 'Humas Admin') }}</h4>
                        <p style="font-size: 0.75rem; color: var(--text-muted);">{{ Session::get('admin_email', 'admin@sman1-tpi.sch.id') }}</p>
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

                <!-- Stats Cards Grid -->
                <div class="admin-stats">
                    <!-- Stat 1: Articles -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-info">
                            <h4>Total Artikel</h4>
                            <p>{{ $stats['articles'] }}</p>
                        </div>
                        <div class="admin-stat-icon">
                            <i class="fa-solid fa-newspaper"></i>
                        </div>
                    </div>
                    
                    <!-- Stat 2: Gallery -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-info">
                            <h4>Foto Galeri</h4>
                            <p>{{ $stats['galleries'] }}</p>
                        </div>
                        <div class="admin-stat-icon">
                            <i class="fa-solid fa-images"></i>
                        </div>
                    </div>

                    <!-- Stat 3: Total Messages -->
                    <div class="admin-stat-card">
                        <div class="admin-stat-info">
                            <h4>Pesan Masuk</h4>
                            <p>{{ $stats['messages'] }}</p>
                        </div>
                        <div class="admin-stat-icon">
                            <i class="fa-solid fa-envelope"></i>
                        </div>
                    </div>

                    <!-- Stat 4: Unread Messages -->
                    <div class="admin-stat-card" style="border-left: 4px solid var(--accent-color);">
                        <div class="admin-stat-info">
                            <h4>Belum Dibaca</h4>
                            <p style="color: var(--accent-color);">{{ $stats['unread_messages'] }}</p>
                        </div>
                        <div class="admin-stat-icon" style="color: var(--accent-color); background-color: rgba(212,175,55,0.05);">
                            <i class="fa-solid fa-envelope-open-text"></i>
                        </div>
                    </div>
                </div>

                <!-- Messages Inbox Section -->
                <div class="admin-card">
                    <div class="admin-card-header">
                        <h2 style="font-size: 1.3rem; color: var(--primary-dark);"><i class="fa-solid fa-inbox text-gold"></i> Pesan Masuk Terbaru (Maks. 10)</h2>
                        <a href="{{ route('admin.messages') }}" class="btn-primary" style="padding: 0.5rem 1rem; font-size: 0.8rem;"><i class="fa-solid fa-list"></i> Lihat Semua Pesan</a>
                    </div>
                    
                    <div class="admin-table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>Pengirim</th>
                                    <th>Subjek</th>
                                    <th>Isi Pesan</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($messages as $msg)
                                    <tr>
                                        <td data-label="Pengirim">
                                            <strong style="color: var(--primary-dark);">{{ $msg->name }}</strong>
                                            <div style="font-size: 0.75rem; color: var(--text-muted);">{{ $msg->email }}</div>
                                        </td>
                                        <td data-label="Subjek"><strong>{{ $msg->subject }}</strong></td>
                                        <td data-label="Isi Pesan" style="max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; font-size: 0.85rem;" title="{{ $msg->message }}">
                                            {{ $msg->message }}
                                        </td>
                                        <td data-label="Tanggal" style="font-size: 0.8rem; color: var(--text-muted);">{{ $msg->created_at->format('d M Y H:i') }}</td>
                                        <td data-label="Status">
                                            @if($msg->is_read)
                                                <span class="badge badge-success">Dibaca</span>
                                            @else
                                                <span class="badge badge-warning">Baru</span>
                                            @endif
                                        </td>
                                        <td data-label="Aksi" class="action-btns">
                                            @if(!$msg->is_read)
                                                <form action="{{ route('admin.messages.read', $msg->id) }}" method="POST" style="display:inline;">
                                                    @csrf
                                                    <button type="submit" class="btn-sm btn-edit" title="Tandai Sudah Dibaca"><i class="fa-solid fa-check"></i></button>
                                                </form>
                                            @endif
                                            <form action="{{ route('admin.messages.delete', $msg->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                                @csrf
                                                <button type="submit" class="btn-sm btn-delete" title="Hapus"><i class="fa-solid fa-trash"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 3rem; color: var(--text-muted);">
                                            <i class="fa-solid fa-envelope-circle-check" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.2;"></i>
                                            <p>Kotak masuk pesan kosong.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
