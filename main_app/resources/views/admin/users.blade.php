<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Pengguna – SMAN 1 Tanjungpinang</title>
    
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Kelola Pengguna Humas</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Kelola data dan hak akses staf portal Administrator & Penulis Berita (Writer).</p>
                </div>
                
                <div>
                    <a href="{{ route('admin.users.create') }}" class="btn-accent"><i class="fa-solid fa-user-plus"></i> Tambah Pengguna Baru</a>
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

                <!-- Validation Errors -->
                @if($errors->any())
                    <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239,68,68,0.05); border-color: rgba(239,68,68,0.15); color: #ef4444;">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ $errors->first() }}
                    </div>
                @endif

                <!-- Users Manage Card -->
                <div class="admin-card">
                    <div class="admin-table-container">
                        <table class="admin-table">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Pengguna</th>
                                    <th>Alamat Surel (Email)</th>
                                    <th>Hak Akses / Peran</th>
                                    <th>Tanggal Ditambahkan</th>
                                    <th style="width: 150px; text-align: center;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($users as $user)
                                    <tr>
                                        <td data-label="ID">#{{ $user->id }}</td>
                                        <td data-label="Nama Pengguna">
                                            <strong style="color: var(--primary-dark); font-size: 0.95rem;">{{ $user->name }}</strong>
                                            @if($user->id === Session::get('admin_id'))
                                                <span style="font-size: 0.7rem; color: var(--primary-light); font-weight: bold; background-color: rgba(26,126,242,0.1); padding: 0.1rem 0.4rem; border-radius: 4px; margin-left: 0.25rem;">Anda</span>
                                            @endif
                                        </td>
                                        <td data-label="Alamat Email"><strong>{{ $user->email }}</strong></td>
                                        <td data-label="Hak Akses">
                                            @if($user->role === 'admin')
                                                <span class="badge" style="background-color: var(--accent-color); color: var(--primary-dark); font-weight: 700;"><i class="fa-solid fa-user-shield"></i> Administrator</span>
                                            @elseif($user->role === 'ppdb')
                                                <span class="badge" style="background-color: rgba(22, 163, 74, 0.08); color: #16a34a; border: 1px solid rgba(22, 163, 74, 0.2);"><i class="fa-solid fa-users-viewfinder"></i> Panitia SPMB</span>
                                            @else
                                                <span class="badge" style="background-color: rgba(11, 99, 197, 0.08); color: var(--primary-color); border: 1px solid rgba(11, 99, 197, 0.2);"><i class="fa-solid fa-pen-fancy"></i> Writer (Penulis)</span>
                                            @endif
                                        </td>
                                        <td data-label="Tanggal Ditambahkan" style="font-size: 0.85rem; color: var(--text-muted);">{{ $user->created_at->format('d M Y') }}</td>
                                        <td data-label="Aksi" class="action-btns">
                                            <a href="{{ route('admin.users.edit', $user->id) }}" class="btn-sm btn-edit" title="Edit Pengguna" style="display: inline-flex; align-items: center; justify-content: center; padding: 0.45rem 0.7rem; background-color: rgba(11, 99, 197, 0.1); color: var(--primary-color);"><i class="fa-solid fa-pen"></i></a>
                                            
                                            @if($user->id !== Session::get('admin_id'))
                                                <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pengguna ini? Kredensial masuk mereka akan dinonaktifkan permanently.')">
                                                    @csrf
                                                    <button type="submit" class="btn-sm btn-delete" title="Hapus Pengguna" style="display: inline-flex; align-items: center; justify-content: center; padding: 0.45rem 0.7rem;"><i class="fa-solid fa-trash"></i></button>
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" style="text-align: center; padding: 4rem; color: var(--text-muted);">
                                            <i class="fa-solid fa-users-slash" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                                            <p>Belum ada pengguna terdaftar.</p>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    
                    <!-- Pagination Links -->
                    <div class="pagination-wrapper">
                        {{ $users->links() }}
                    </div>
                </div>

            </div>
        </main>

    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
