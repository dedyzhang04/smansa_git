<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola PPDB (Siswa Baru) – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    
    <style>
        .tab-btn.active::after {
            content: '';
            position: absolute;
            bottom: -0.6rem;
            left: 0;
            width: 100%;
            height: 3px;
            background-color: var(--primary-color);
            border-radius: 2px;
        }
    </style>
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Administrasi PPDB / Siswa Baru</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Kelola data penerimaan, impor Excel data kelulusan, dan unduh berkas persyaratan daftar ulang siswa.</p>
                </div>
                
                <div class="admin-user-profile">
                    <div class="admin-avatar">
                        <i class="fa-solid fa-user-shield"></i>
                    </div>
                    <div style="text-align: left;">
                        <h4 style="font-size: 0.9rem; color: var(--primary-dark); font-weight: 700;">{{ Session::get('admin_name', 'Humas Admin') }}</h4>
                        <p style="font-size: 0.75rem; color: var(--text-muted);">{{ Session::get('admin_role') === 'admin' ? 'Administrator' : 'Penulis' }}</p>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="admin-content">
                
                <!-- Feedback messages -->
                @if(Session::has('success'))
                    <div class="alert alert-success" style="margin-bottom: 2rem;">
                        <i class="fa-solid fa-circle-check"></i> {{ Session::get('success') }}
                    </div>
                @endif

                @if(Session::has('error'))
                    <div class="alert alert-danger" style="margin-bottom: 2rem; background-color: rgba(239, 68, 68, 0.08); border-color: rgba(239, 68, 68, 0.15); color: #ef4444;">
                        <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('error') }}
                    </div>
                @endif

                <!-- Setup Forms Row (Excel Import & Template Upload) -->
                <div class="admin-grid-2" style="margin-bottom: 2rem;">
                    
                    <!-- 1. Import Excel Card -->
                    <div class="admin-card" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem;"><i class="fa-solid fa-file-excel text-gold"></i> Impor Data Calon Siswa Baru</h3>
                        <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1.25rem; line-height: 1.5;">
                            Unggah file Excel (.xlsx) dengan struktur kolom: <br>
                            <strong>A: NISN</strong>, <strong>B: Nama Lengkap</strong>, <strong>C: Tempat Lahir</strong>, <strong>D: Tanggal Lahir</strong>, <strong>E: Rekomendasi Kelas</strong>.
                            <br>
                            <a href="{{ asset('storage/templates/template_import_siswa.xlsx') }}" download class="text-gold" style="font-weight: 700; text-decoration: underline; display: inline-block; margin-top: 0.5rem;"><i class="fa-solid fa-download"></i> Unduh Template Excel</a>
                        </p>
                        
                        <form action="{{ route('admin.ppdb.import') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                                <input type="file" name="excel_file" accept=".xlsx, .xls" required class="form-control" style="flex: 1; padding: 0.45rem 0.75rem; font-size: 0.85rem; border: 1.5px solid #e2e8f0; border-radius: 6px;">
                                <button type="submit" class="btn-accent" style="padding: 0.55rem 1rem; font-size: 0.85rem; font-weight: 700;"><i class="fa-solid fa-upload"></i> Impor Data</button>
                            </div>
                        </form>
                    </div>

                    <!-- 2. Template Upload Card -->
                    <div class="admin-card" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 1.5rem;">
                        <h3 style="font-size: 1.1rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 0.5rem;"><i class="fa-solid fa-file-signature text-gold"></i> Unggah Template Surat Pernyataan</h3>
                        <p style="font-size: 0.8rem; color: var(--text-muted); margin-bottom: 1.25rem; line-height: 1.5;">
                            Unggah surat pernyataan dalam format PDF / DOCX / Gambar agar dapat diunduh calon siswa di halaman pencarian NISN mereka.
                        </p>
                        
                        <form action="{{ route('admin.ppdb.upload-template') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div style="display: flex; gap: 0.75rem; align-items: center; flex-wrap: wrap;">
                                <input type="file" name="template_file" accept=".pdf, .docx, .doc, image/*" required class="form-control" style="flex: 1; padding: 0.45rem 0.75rem; font-size: 0.85rem; border: 1.5px solid #e2e8f0; border-radius: 6px;">
                                <button type="submit" class="btn-primary" style="padding: 0.55rem 1rem; font-size: 0.85rem; font-weight: 700;"><i class="fa-solid fa-file-arrow-up"></i> Unggah Berkas</button>
                            </div>
                        </form>
                        
                        @if($templatePath)
                            <div style="margin-top: 0.75rem; font-size: 0.75rem; color: #10b981; font-weight: 600;">
                                <i class="fa-solid fa-circle-check"></i> Template Aktif: <a href="{{ asset($templatePath) }}" target="_blank" class="text-gold" style="text-decoration: underline;">Unduh Berkas Saat Ini</a>
                            </div>
                        @endif
                    </div>
                </div>
                <!-- Filters & Student Table Card -->
                <div class="admin-card" style="box-shadow: 0 4px 15px rgba(0,0,0,0.03); border: 1px solid rgba(0,0,0,0.05); border-radius: 12px; background-color: #fff; padding: 2rem;">
                    
                    <!-- TAB NAVIGATION -->
                    <div style="display: flex; gap: 1rem; border-bottom: 2px solid #edf2f7; margin-bottom: 1.5rem; padding-bottom: 0.5rem; flex-wrap: wrap;">
                        <button id="btn-tab-siswa" class="tab-btn active" onclick="switchPpdbTab('siswa')" style="background: none; border: none; font-size: 1rem; font-weight: 700; color: var(--primary-color); cursor: pointer; padding: 0.5rem 1rem; position: relative;">
                            <i class="fa-solid fa-users"></i> Daftar Calon Siswa
                        </button>
                        <button id="btn-tab-jadwal" class="tab-btn" onclick="switchPpdbTab('jadwal')" style="background: none; border: none; font-size: 1rem; font-weight: 700; color: var(--text-muted); cursor: pointer; padding: 0.5rem 1rem; position: relative;">
                            <i class="fa-solid fa-calendar-days"></i> Kelola Jadwal Verifikasi
                        </button>
                        <button id="btn-tab-verifikasi" class="tab-btn" onclick="switchPpdbTab('verifikasi')" style="background: none; border: none; font-size: 1rem; font-weight: 700; color: var(--text-muted); cursor: pointer; padding: 0.5rem 1rem; position: relative;">
                            <i class="fa-solid fa-list-ol"></i> Verifikasi Antrean
                        </button>
                    </div>

                    <!-- TAB 1: DAFTAR SISWA -->
                    <div id="section-tab-siswa">
                        <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 2px solid #edf2f7; padding-bottom: 1rem; margin-bottom: 1.5rem; flex-wrap: wrap; gap: 1rem;">
                            <div style="display: flex; align-items: center; gap: 1rem; flex-wrap: wrap;">
                                <h2 style="font-size: 1.25rem; color: var(--primary-dark); font-weight: 700; margin: 0;"><i class="fa-solid fa-users text-gold"></i> Daftar Calon Siswa & Status Berkas</h2>
                                <a href="{{ route('admin.ppdb.export-xlsx') }}" class="btn-primary" style="background-color: #10b981; border-color: #10b981; padding: 0.45rem 1.25rem; font-size: 0.8rem; font-weight: 700; text-decoration: none; border-radius: 6px; display: inline-flex; align-items: center; gap: 0.5rem; color: #fff;">
                                    <i class="fa-solid fa-file-excel"></i> Ekspor Semua Data (XLSX)
                                </a>
                            </div>
                            
                            <!-- Search & Status Filters Container -->
                            <div style="display: flex; gap: 1rem; align-items: center; flex-wrap: wrap;">
                                <!-- Search Bar -->
                                <div style="position: relative; display: flex; align-items: center;">
                                    <input type="text" id="admin-search-input" name="q" value="{{ request('q') }}" placeholder="Cari NISN atau Nama..." style="padding: 0.4rem 2rem 0.4rem 0.8rem; font-size: 0.8rem; border: 1.5px solid #cbd5e1; border-radius: 6px; width: 220px; outline: none; transition: border-color 0.2s;" onfocus="this.style.borderColor='var(--primary-color)'" onblur="this.style.borderColor='#cbd5e1'">
                                    <i class="fa-solid fa-magnifying-glass" style="position: absolute; right: 28px; color: #cbd5e1; font-size: 0.85rem; pointer-events: none;"></i>
                                    <span id="clear-search" style="position: absolute; right: 8px; color: var(--text-muted); cursor: pointer; font-size: 1.1rem; line-height: 1; display: {{ request('q') ? 'block' : 'none' }};" title="Bersihkan Pencarian">&times;</span>
                                </div>

                                <!-- Sort Selector -->
                                <div style="display: flex; align-items: center; gap: 0.25rem;">
                                    <label style="font-size: 0.8rem; color: var(--text-muted); font-weight: 600; white-space: nowrap;"><i class="fa-solid fa-arrow-down-wide-short text-gold"></i> Sortir:</label>
                                    <select id="sort-selector" style="padding: 0.4rem 0.5rem; font-size: 0.8rem; border: 1.5px solid #cbd5e1; border-radius: 6px; outline: none; background-color: #fff; cursor: pointer;">
                                        <option value="created_at-desc" {{ $sortBy === 'created_at' && $sortOrder === 'desc' ? 'selected' : '' }}>Terbaru Diimpor</option>
                                        <option value="created_at-asc" {{ $sortBy === 'created_at' && $sortOrder === 'asc' ? 'selected' : '' }}>Terlama Diimpor</option>
                                        <option value="name-asc" {{ $sortBy === 'name' && $sortOrder === 'asc' ? 'selected' : '' }}>Nama (A - Z)</option>
                                        <option value="name-desc" {{ $sortBy === 'name' && $sortOrder === 'desc' ? 'selected' : '' }}>Nama (Z - A)</option>
                                        <option value="nisn-asc" {{ $sortBy === 'nisn' && $sortOrder === 'asc' ? 'selected' : '' }}>NISN (Terkecil)</option>
                                        <option value="nisn-desc" {{ $sortBy === 'nisn' && $sortOrder === 'desc' ? 'selected' : '' }}>NISN (Terbesar)</option>
                                        <option value="uploaded_at-desc" {{ $sortBy === 'uploaded_at' && $sortOrder === 'desc' ? 'selected' : '' }}>Berkas Baru Lengkap</option>
                                        <option value="uploaded_at-asc" {{ $sortBy === 'uploaded_at' && $sortOrder === 'asc' ? 'selected' : '' }}>Berkas Paling Awal Lengkap</option>
                                    </select>
                                </div>

                                <!-- Status Filtering Buttons -->
                                <div style="display: flex; gap: 0.5rem;">
                                    <a href="{{ route('admin.ppdb', ['status' => 'all', 'q' => request('q'), 'sort_by' => $sortBy, 'sort_order' => $sortOrder]) }}" class="status-btn btn-sm {{ !$status || $status === 'all' ? 'btn-edit' : '' }}" data-status="all" style="background-color: {{ !$status || $status === 'all' ? 'var(--primary-color)' : '#edf2f7' }}; color: {{ !$status || $status === 'all' ? '#fff' : 'var(--text-muted)' }}; text-decoration: none; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 600; font-size: 0.8rem;">Semua</a>
                                    <a href="{{ route('admin.ppdb', ['status' => 'pending', 'q' => request('q'), 'sort_by' => $sortBy, 'sort_order' => $sortOrder]) }}" class="status-btn btn-sm" data-status="pending" style="background-color: {{ $status === 'pending' ? 'var(--accent-color)' : '#edf2f7' }}; color: {{ $status === 'pending' ? '#fff' : 'var(--text-muted)' }}; text-decoration: none; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 600; font-size: 0.8rem;">Belum Lengkap</a>
                                    <a href="{{ route('admin.ppdb', ['status' => 'complete', 'q' => request('q'), 'sort_by' => $sortBy, 'sort_order' => $sortOrder]) }}" class="status-btn btn-sm" data-status="complete" style="background-color: {{ $status === 'complete' ? '#10b981' : '#edf2f7' }}; color: {{ $status === 'complete' ? '#fff' : 'var(--text-muted)' }}; text-decoration: none; padding: 0.4rem 0.8rem; border-radius: 6px; font-weight: 600; font-size: 0.8rem;">Lengkap</a>
                                </div>
                            </div>
                        </div>

                        <!-- Notice Active Search -->
                        <div id="search-notice" style="margin-bottom: 1.5rem; font-size: 0.85rem; color: var(--text-muted); background-color: #f8fafc; padding: 0.75rem 1rem; border-radius: 6px; border: 1px dashed #cbd5e1; display: {{ request('q') ? 'flex' : 'none' }}; justify-content: space-between; align-items: center;">
                            <div>
                                <i class="fa-solid fa-circle-info text-gold"></i> Menampilkan hasil pencarian untuk: "<strong id="search-notice-text">{{ request('q') }}</strong>"
                            </div>
                            <a href="#" id="clear-notice-btn" class="text-gold" style="font-weight: 600; text-decoration: none;"><i class="fa-solid fa-circle-xmark"></i> Bersihkan Pencarian</a>
                        </div>

                        <!-- Table Wrapper -->
                        <div id="ppdb-table-wrapper" data-status="{{ $status }}" data-q="{{ $search }}" data-sort-by="{{ $sortBy }}" data-sort-order="{{ $sortOrder }}">
                            @include('admin.partials.ppdb-table')
                        </div>
                    </div>

                    <!-- TAB 2: JADWAL VERIFIKASI -->
                    <div id="section-tab-jadwal" style="display: none;">
                        <div class="admin-grid-2" style="align-items: start; gap: 2rem;">
                            <!-- Left Side: List of Schedules -->
                            <div class="admin-card" style="box-shadow: none; border: 1px solid rgba(0,0,0,0.05); border-radius: 8px; padding: 1.5rem; background-color: #f8fafc;">
                                <h3 style="font-size: 1.1rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1rem;"><i class="fa-solid fa-calendar-check text-gold"></i> Jadwal Verifikasi Aktif</h3>
                                
                                <div class="admin-table-container">
                                    <table class="admin-table" style="min-width: 100%;">
                                        <thead>
                                            <tr>
                                                <th>Rentang Antrean</th>
                                                <th>Hari & Tanggal</th>
                                                <th style="text-align: center;">Jam</th>
                                                <th>Lokasi</th>
                                                <th style="text-align: center; width: 60px;">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($schedules as $sched)
                                                <tr>
                                                    <td data-label="Rentang Antrean"><strong>#{{ $sched->start_queue }} s/d #{{ $sched->end_queue }}</strong></td>
                                                    <td data-label="Hari & Tanggal">
                                                        {{ \Carbon\Carbon::parse($sched->date)->locale('id')->settings(['formatFunction' => 'translatedFormat'])->format('l, d F Y') }}
                                                    </td>
                                                    <td data-label="Jam" style="text-align: center;">
                                                        <span class="badge" style="background-color: var(--primary-color); color: #fff; font-weight: 600; padding: 0.35rem 0.6rem; border-radius: 4px; font-size: 0.75rem;">
                                                            {{ $sched->time }} WIB
                                                        </span>
                                                    </td>
                                                    <td data-label="Lokasi" style="font-size: 0.85rem;">{{ $sched->location ?: 'Ruang Panitia SPMB SMAN 1 Tanjungpinang' }}</td>
                                                    <td data-label="Aksi" style="text-align: center;">
                                                        <form action="{{ route('admin.ppdb.delete-schedule', $sched->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus jadwal verifikasi ini?')" style="display: inline-block; margin: 0;">
                                                            @csrf
                                                            <button type="submit" class="btn-sm btn-delete" title="Hapus Jadwal" style="margin: 0; display: inline-flex; align-items: center; justify-content: center; height: 28px; width: 28px;">
                                                                 <i class="fa-solid fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @empty
                                                <tr>
                                                    <td colspan="4" style="text-align: center; padding: 3rem; color: var(--text-muted); font-style: italic;">
                                                        <i class="fa-solid fa-calendar-xmark" style="font-size: 2rem; margin-bottom: 0.5rem; opacity: 0.3; display: block;"></i>
                                                        Belum ada jadwal verifikasi berkas yang dikonfigurasi.
                                                    </td>
                                                </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <!-- Right Side: Form to Add Schedule -->
                            <div class="admin-card" style="box-shadow: none; border: 1px solid rgba(0,0,0,0.05); border-radius: 8px; padding: 1.5rem; background-color: #fff;">
                                <h3 style="font-size: 1.1rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1rem;"><i class="fa-solid fa-calendar-plus text-gold"></i> Tambah Jadwal Verifikasi</h3>
                                
                                <form action="{{ route('admin.ppdb.store-schedule') }}" method="POST">
                                    @csrf
                                    
                                    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem; margin-bottom: 1rem;">
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label style="font-weight: 600; font-size: 0.8rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Antrean Mulai *</label>
                                            <input type="number" name="start_queue" min="1" value="{{ old('start_queue') }}" required class="form-control" style="padding: 0.5rem; font-size: 0.85rem;" placeholder="1">
                                        </div>
                                        <div class="form-group" style="margin-bottom: 0;">
                                            <label style="font-weight: 600; font-size: 0.8rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Antrean Selesai *</label>
                                            <input type="number" name="end_queue" min="1" value="{{ old('end_queue') }}" required class="form-control" style="padding: 0.5rem; font-size: 0.85rem;" placeholder="50">
                                        </div>
                                    </div>

                                    <div class="form-group" style="margin-bottom: 1rem;">
                                        <label style="font-weight: 600; font-size: 0.8rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Tanggal Kehadiran *</label>
                                        <input type="date" name="date" value="{{ old('date') }}" required class="form-control" style="padding: 0.5rem; font-size: 0.85rem; background-color: #fff;">
                                    </div>

                                    <div class="form-group" style="margin-bottom: 1rem;">
                                        <label style="font-weight: 600; font-size: 0.8rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Jam Verifikasi *</label>
                                        <input type="time" name="time" value="{{ old('time', '08:00') }}" required class="form-control" style="padding: 0.5rem; font-size: 0.85rem;">
                                    </div>

                                    <div class="form-group" style="margin-bottom: 1.5rem;">
                                        <label style="font-weight: 600; font-size: 0.8rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Lokasi Verifikasi</label>
                                        <input type="text" name="location" value="{{ old('location', 'Ruang Panitia SPMB SMAN 1 Tanjungpinang') }}" class="form-control" style="padding: 0.5rem; font-size: 0.85rem;" placeholder="Contoh: Aula Utama, Lab Komputer, dll.">
                                    </div>

                                    <button type="submit" class="btn-primary" style="width: 100%; padding: 0.65rem; font-weight: 700; font-size: 0.9rem; justify-content: center; display: flex; align-items: center; gap: 0.5rem;">
                                        <i class="fa-solid fa-plus"></i> Simpan Jadwal Verifikasi
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <!-- TAB 3: VERIFIKASI ANTREAN -->
                    <div id="section-tab-verifikasi" style="display: none;">
                        <h2 style="font-size: 1.25rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1.5rem;"><i class="fa-solid fa-list-ol text-gold"></i> Antrean Verifikasi Dokumen & Berkas</h2>
                        
                        <div class="admin-table-container">
                            <table class="admin-table">
                                <thead>
                                    <tr>
                                        <th style="width: 100px; text-align: center;">No. Antrean</th>
                                        <th>NISN</th>
                                        <th>Nama Lengkap</th>
                                        <th>Rekomendasi</th>
                                        <th style="text-align: center;">KK</th>
                                        <th style="text-align: center;">Akta</th>
                                        <th style="text-align: center;">SKL</th>
                                        <th style="text-align: center;">SPMB</th>
                                        <th style="text-align: center;">Surat</th>
                                        <th>Status Verifikasi</th>
                                        <th>Petugas</th>
                                        <th style="width: 120px; text-align: center;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($queuedStudents as $qStudent)
                                        <tr>
                                            <td data-label="No. Antrean" style="text-align: center;">
                                                <span class="badge" style="background-color: #d4af37; color: #fff; font-weight: 700; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.8rem;">#{{ $qStudent->queue_number }}</span>
                                            </td>
                                            <td data-label="NISN"><strong>{{ $qStudent->nisn }}</strong></td>
                                            <td data-label="Nama Lengkap">
                                                <a href="#" class="view-biodata" data-student="{{ json_encode($qStudent) }}" style="color: var(--primary-dark); text-decoration: none; font-weight: 700;" title="Klik untuk lihat detail biodata">{{ $qStudent->name }}</a>
                                            </td>
                                            <td data-label="Rekomendasi">{{ $qStudent->class_recommendation ?: 'Umum / Lulus' }}</td>
                                            
                                            <!-- KK -->
                                            <td data-label="KK" style="text-align: center;">
                                                @if($qStudent->kk_path)
                                                    <a href="{{ asset($qStudent->kk_path) }}" class="text-gold view-document" data-title="Kartu Keluarga (KK) – {{ $qStudent->name }}" title="Lihat Kartu Keluarga"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                                                @else
                                                    <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                                                @endif
                                            </td>

                                            <!-- Akta -->
                                            <td data-label="Akta" style="text-align: center;">
                                                @if($qStudent->akta_path)
                                                    <a href="{{ asset($qStudent->akta_path) }}" class="text-gold view-document" data-title="Akta Kelahiran – {{ $qStudent->name }}" title="Lihat Akta Kelahiran"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                                                @else
                                                    <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                                                @endif
                                            </td>

                                            <!-- SKL -->
                                            <td data-label="SKL" style="text-align: center;">
                                                @if($qStudent->photo_path)
                                                    <a href="{{ asset($qStudent->photo_path) }}" class="text-gold view-document" data-title="SKL – {{ $qStudent->name }}" title="Lihat SKL"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                                                @else
                                                    <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                                                @endif
                                            </td>

                                            <!-- SPMB -->
                                            <td data-label="SPMB" style="text-align: center;">
                                                @if($qStudent->spmb_path)
                                                    <a href="{{ asset($qStudent->spmb_path) }}" class="text-gold view-document" data-title="Bukti SPMB – {{ $qStudent->name }}" title="Lihat Bukti SPMB"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                                                @else
                                                    <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                                                @endif
                                            </td>

                                            <!-- Surat -->
                                            <td data-label="Surat" style="text-align: center;">
                                                @if($qStudent->statement_path)
                                                    <a href="{{ asset($qStudent->statement_path) }}" class="text-gold view-document" data-title="Surat Pernyataan – {{ $qStudent->name }}" title="Lihat Surat Pernyataan"><i class="fa-solid fa-circle-check" style="color: #10b981; font-size: 1.1rem;"></i></a>
                                                @else
                                                    <i class="fa-solid fa-circle-xmark" style="color: #cbd5e1; font-size: 1.1rem;"></i>
                                                @endif
                                            </td>

                                            <td data-label="Status Verifikasi">
                                                @if($qStudent->verification_status === 'verified')
                                                    <span class="badge" style="background-color: #10b981; color: #fff; font-weight: 600; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem;">Lolos (OK)</span>
                                                @elseif($qStudent->verification_status === 'rejected')
                                                    <span class="badge" style="background-color: #ef4444; color: #fff; font-weight: 600; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem;">Revisi (Tidak OK)</span>
                                                @else
                                                    <span class="badge" style="background-color: #6b7280; color: #fff; font-weight: 600; padding: 0.25rem 0.5rem; border-radius: 4px; font-size: 0.75rem;">Menunggu</span>
                                                @endif
                                            </td>

                                            <td data-label="Petugas">
                                                <span style="font-size: 0.85rem; font-weight: 600;">{{ $qStudent->verified_by ?: '-' }}</span>
                                            </td>

                                            <td data-label="Aksi" style="text-align: center;">
                                                <button type="button" class="btn-primary open-verify-modal" data-student="{{ json_encode($qStudent) }}" style="padding: 0.35rem 0.6rem; border-radius: 4px; font-size: 0.8rem; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 0.25rem; background-color: var(--primary-color); border: none; color: #fff;">
                                                    <i class="fa-solid fa-user-check"></i> Proses
                                                </button>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="12" style="text-align: center; padding: 4rem; color: var(--text-muted);">
                                                <i class="fa-solid fa-list-check" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.2;"></i>
                                                <p>Belum ada siswa yang mengisi biodata atau mengunggah berkas untuk masuk ke antrean verifikasi.</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>

            </div>
        </main>

    </div>

    <!-- Modal Viewer for Document Images/PDFs -->
    <div id="document-modal" class="lightbox">
        <div class="lightbox-content" style="max-width: 800px; width: 90%; padding: 1.5rem; background: #fff; border-radius: 12px; position: relative; max-height: 90vh; display: flex; flex-direction: column; overflow: hidden;">
            <button class="lightbox-close" id="close-document-modal" style="position: absolute; top: 10px; right: 15px; font-size: 2rem; background: none; border: none; cursor: pointer; color: var(--text-dark); z-index: 10;">&times;</button>
            <h3 id="document-modal-title" style="font-size: 1.2rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1.25rem; border-bottom: 1px solid #edf2f7; padding-bottom: 0.5rem; text-align: left; flex-shrink: 0;"><i class="fa-solid fa-file-invoice text-gold"></i> Pratinjau Dokumen</h3>
            <div style="text-align: center; flex: 1; overflow-y: auto; display: flex; justify-content: center; align-items: center; min-height: 400px; background-color: #f8fafc; border-radius: 6px; border: 1px solid #edf2f7;">
                <img id="document-modal-img" src="" alt="Pratinjau Dokumen" style="max-width: 100%; max-height: 70vh; height: auto; border-radius: 6px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); display: none;">
                <iframe id="document-modal-iframe" src="" style="width: 100%; height: 70vh; border: none; border-radius: 6px; display: none;"></iframe>
            </div>
        </div>
    </div>

    <!-- Modal Viewer for Student Biodata -->
    <div id="biodata-modal" class="lightbox">
        <div class="lightbox-content" style="max-width: 800px; padding: 2rem; background: #fff; border-radius: 12px; position: relative; width: 90%; max-height: 85vh; display: flex; flex-direction: column; overflow: hidden;">
            <button class="lightbox-close" id="close-biodata-modal" style="position: absolute; top: 15px; right: 20px; font-size: 2rem; background: none; border: none; cursor: pointer; color: var(--text-dark);">&times;</button>
            <h3 style="font-size: 1.3rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1.5rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem; text-align: left; flex-shrink: 0;">
                <i class="fa-solid fa-address-card text-gold"></i> Detail Biodata Calon Siswa
            </h3>
            <div id="biodata-modal-content" style="overflow-y: auto; text-align: left; flex: 1; padding-right: 0.5rem;">
                <!-- JavaScript will populate this -->
            </div>
        </div>
    </div>

    <!-- Modal for Process Verification -->
    <div id="verification-modal" class="lightbox">
        <div class="lightbox-content" style="max-width: 600px; padding: 2rem; background: #fff; border-radius: 12px; position: relative; width: 90%; max-height: 90vh; display: flex; flex-direction: column; overflow: hidden;">
            <button class="lightbox-close" id="close-verification-modal" style="position: absolute; top: 15px; right: 20px; font-size: 2rem; background: none; border: none; cursor: pointer; color: var(--text-dark);">&times;</button>
            <h3 style="font-size: 1.3rem; color: var(--primary-dark); font-weight: 700; margin-bottom: 1.5rem; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.5rem; text-align: left; flex-shrink: 0;">
                <i class="fa-solid fa-user-check text-gold"></i> Proses Verifikasi Pendaftaran
            </h3>
            <form id="verify-form" action="" method="POST" style="overflow-y: auto; text-align: left; flex: 1; padding-right: 0.5rem;">
                @csrf
                <div style="margin-bottom: 1.25rem;">
                    <p style="font-size: 0.85rem; color: var(--text-muted); margin-bottom: 0.5rem;">
                        Memproses data pendaftaran untuk siswa: <br>
                        <strong id="verify-student-name" style="font-size: 1rem; color: var(--primary-dark);">Nama Siswa</strong> (NISN: <span id="verify-student-nisn">00000</span>)
                    </p>
                </div>

                <div class="form-group" style="margin-bottom: 1.25rem;">
                    <label style="font-weight: 600; font-size: 0.85rem; display: block; margin-bottom: 0.5rem; color: var(--text-dark);">Status Verifikasi *</label>
                    <div style="display: flex; gap: 1.5rem;">
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; font-size: 0.9rem; font-weight: 600; color: #10b981;">
                            <input type="radio" name="verification_status" value="verified" id="verify-status-ok" required style="accent-color: #10b981; scale: 1.2;">
                            <i class="fa-solid fa-circle-check"></i> Lolos Verifikasi (OK)
                        </label>
                        <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer; font-size: 0.9rem; font-weight: 600; color: #ef4444;">
                            <input type="radio" name="verification_status" value="rejected" id="verify-status-revisi" style="accent-color: #ef4444; scale: 1.2;">
                            <i class="fa-solid fa-circle-xmark"></i> Perlu Perbaikan (Tidak OK)
                        </label>
                    </div>
                </div>

                <div class="form-group" id="verify-notes-container" style="margin-bottom: 1.25rem; display: none;">
                    <label style="font-weight: 600; font-size: 0.85rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Catatan untuk Siswa *</label>
                    <textarea name="verification_notes" id="verify-notes-textarea" class="form-control" rows="3" style="padding: 0.5rem; font-size: 0.85rem; border: 1.5px solid #cbd5e1; border-radius: 6px; width: 100%; outline: none;" placeholder="Tuliskan berkas/data yang salah atau perlu diperbaiki siswa..."></textarea>
                    <span style="font-size: 0.75rem; color: var(--text-muted);">Catatan ini akan langsung tampil di portal pendaftaran siswa.</span>
                </div>

                <div class="form-group" style="margin-bottom: 1.25rem;">
                    <label style="font-weight: 600; font-size: 0.85rem; display: block; margin-bottom: 0.35rem; color: var(--text-dark);">Catatan Internal Admin (Catatan Kecil)</label>
                    <textarea name="admin_notes" id="verify-admin-notes" class="form-control" rows="2" style="padding: 0.5rem; font-size: 0.85rem; border: 1.5px solid #cbd5e1; border-radius: 6px; width: 100%; outline: none;" placeholder="Tulis catatan rahasia internal panitia di sini... (tidak dilihat siswa)"></textarea>
                </div>

                <div class="form-group" id="allow-edit-checkbox-container" style="margin-bottom: 1.5rem; display: flex; align-items: center; gap: 0.5rem;">
                    <input type="checkbox" name="allow_edit" value="1" id="verify-allow-edit" style="accent-color: var(--primary-color); scale: 1.1; cursor: pointer;">
                    <label for="verify-allow-edit" style="font-size: 0.85rem; color: var(--text-dark); cursor: pointer; font-weight: 600;">Buka akses edit biodata/unggah berkas untuk siswa</label>
                </div>

                <button type="submit" class="btn-accent" style="width: 100%; padding: 0.65rem; font-weight: 700; font-size: 0.9rem; justify-content: center; display: flex; align-items: center; gap: 0.5rem; border: none; cursor: pointer; color: #fff;">
                    <i class="fa-solid fa-floppy-disk"></i> Simpan Status Verifikasi
                </button>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/admin.js') }}"></script>
    <script>
        function switchPpdbTab(tabName) {
            const btnSiswa = document.getElementById('btn-tab-siswa');
            const btnJadwal = document.getElementById('btn-tab-jadwal');
            const btnVerifikasi = document.getElementById('btn-tab-verifikasi');
            const sectionSiswa = document.getElementById('section-tab-siswa');
            const sectionJadwal = document.getElementById('section-tab-jadwal');
            const sectionVerifikasi = document.getElementById('section-tab-verifikasi');

            // Save active tab to localStorage
            localStorage.setItem('active_ppdb_tab', tabName);

            // Reset active classes & colors
            [btnSiswa, btnJadwal, btnVerifikasi].forEach(btn => {
                if (btn) {
                    btn.classList.remove('active');
                    btn.style.color = 'var(--text-muted)';
                }
            });
            [sectionSiswa, sectionJadwal, sectionVerifikasi].forEach(sec => {
                if (sec) sec.style.display = 'none';
            });

            if (tabName === 'siswa') {
                if (btnSiswa) {
                    btnSiswa.classList.add('active');
                    btnSiswa.style.color = 'var(--primary-color)';
                }
                if (sectionSiswa) sectionSiswa.style.display = 'block';
            } else if (tabName === 'jadwal') {
                if (btnJadwal) {
                    btnJadwal.classList.add('active');
                    btnJadwal.style.color = 'var(--primary-color)';
                }
                if (sectionJadwal) sectionJadwal.style.display = 'block';
            } else if (tabName === 'verifikasi') {
                if (btnVerifikasi) {
                    btnVerifikasi.classList.add('active');
                    btnVerifikasi.style.color = 'var(--primary-color)';
                }
                if (sectionVerifikasi) sectionVerifikasi.style.display = 'block';
            }
        }

        // Realtime Search & Sort AJAX Logic
        document.addEventListener('DOMContentLoaded', () => {
            // Determine initial tab: server-side override (success/error redirects) has top priority
            let initialTab = '';
            @if($errors->has('start_queue') || $errors->has('end_queue') || $errors->has('date') || Session::has('success') && (strpos(Session::get('success'), 'Jadwal') !== false || strpos(Session::get('success'), 'jadwal') !== false) || Session::has('error') && strpos(Session::get('error'), 'antrean') !== false)
                initialTab = 'jadwal';
            @elseif($errors->has('verification_status') || $errors->has('verification_notes') || Session::has('success') && (strpos(Session::get('success'), 'verifikasi') !== false || strpos(Session::get('success'), 'Verifikasi') !== false))
                initialTab = 'verifikasi';
            @endif

            if (initialTab) {
                switchPpdbTab(initialTab);
            } else {
                // Otherwise read from localStorage, default to 'siswa'
                const storedTab = localStorage.getItem('active_ppdb_tab') || 'siswa';
                switchPpdbTab(storedTab);
            }

            const searchInput = document.getElementById('admin-search-input');
            const clearSearch = document.getElementById('clear-search');
            const sortSelector = document.getElementById('sort-selector');
            const statusBtns = document.querySelectorAll('.status-btn');
            const tableWrapper = document.getElementById('ppdb-table-wrapper');
            const searchNotice = document.getElementById('search-notice');
            const searchNoticeText = document.getElementById('search-notice-text');
            const clearNoticeBtn = document.getElementById('clear-notice-btn');

            let currentStatus = tableWrapper.getAttribute('data-status') || 'all';
            let currentSortBy = tableWrapper.getAttribute('data-sort-by') || 'created_at';
            let currentSortOrder = tableWrapper.getAttribute('data-sort-order') || 'desc';
            let searchQuery = searchInput.value;
            let debounceTimer;

            // Helper to build fetch URL
            const fetchPpdbData = (pageUrl = null) => {
                let url = pageUrl || "{{ route('admin.ppdb') }}";
                const urlObj = new URL(url.startsWith('http') ? url : window.location.origin + url);
                
                // Set parameters
                if (currentStatus) urlObj.searchParams.set('status', currentStatus);
                else urlObj.searchParams.delete('status');
                
                if (searchQuery) urlObj.searchParams.set('q', searchQuery);
                else urlObj.searchParams.delete('q');
                
                urlObj.searchParams.set('sort_by', currentSortBy);
                urlObj.searchParams.set('sort_order', currentSortOrder);

                // Show loading state
                tableWrapper.style.opacity = '0.5';

                fetch(urlObj.toString(), {
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    tableWrapper.innerHTML = data.html;
                    tableWrapper.style.opacity = '1';
                    
                    // Re-bind document click events for lightbox preview
                    bindLightboxEvents();
                    
                    // Re-bind biodata click events
                    bindBiodataEvents();
                    
                    // Re-bind sort headers and pagination links
                    bindTableWrapperEvents();

                    // Update parameters helper in wrapper dataset
                    tableWrapper.setAttribute('data-status', currentStatus);
                    tableWrapper.setAttribute('data-sort-by', currentSortBy);
                    tableWrapper.setAttribute('data-sort-order', currentSortOrder);

                    // Update notice bar
                    if (searchQuery) {
                        if (searchNotice) {
                            searchNotice.style.display = 'flex';
                            searchNoticeText.innerHTML = searchQuery;
                        }
                    } else {
                        if (searchNotice) searchNotice.style.display = 'none';
                    }
                })
                .catch(error => {
                    console.error('Error fetching PPDB data:', error);
                    tableWrapper.style.opacity = '1';
                });
            };

            // Input event for search (with debounce)
            searchInput.addEventListener('input', (e) => {
                searchQuery = e.target.value.trim();
                clearSearch.style.display = searchQuery ? 'block' : 'none';

                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    fetchPpdbData();
                }, 300);
            });

            // Clear search action
            if (clearSearch) {
                clearSearch.addEventListener('click', () => {
                    searchInput.value = '';
                    searchQuery = '';
                    clearSearch.style.display = 'none';
                    fetchPpdbData();
                });
            }

            // Notice clear button
            if (clearNoticeBtn) {
                clearNoticeBtn.addEventListener('click', (e) => {
                    e.preventDefault();
                    searchInput.value = '';
                    searchQuery = '';
                    clearSearch.style.display = 'none';
                    fetchPpdbData();
                });
            }

            // Select event for sorting dropdown
            sortSelector.addEventListener('change', (e) => {
                const parts = e.target.value.split('-');
                currentSortBy = parts[0];
                currentSortOrder = parts[1];
                fetchPpdbData();
            });

            // Click event for status filtering links
            statusBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    e.preventDefault();
                    
                    // Update active button state
                    statusBtns.forEach(b => {
                        b.classList.remove('btn-edit');
                        b.style.backgroundColor = '#edf2f7';
                        b.style.color = 'var(--text-muted)';
                    });
                    
                    btn.classList.add('btn-edit');
                    const color = btn.getAttribute('data-status') === 'complete' ? '#10b981' : (btn.getAttribute('data-status') === 'pending' ? 'var(--accent-color)' : 'var(--primary-color)');
                    btn.style.backgroundColor = color;
                    btn.style.color = '#fff';

                    currentStatus = btn.getAttribute('data-status') || '';
                    fetchPpdbData();
                });
            });

            // Intercept pagination clicks and sort headers clicks inside wrapper
            const bindTableWrapperEvents = () => {
                // Pagination links
                const pageLinks = tableWrapper.querySelectorAll('.pagination-wrapper a');
                pageLinks.forEach(link => {
                    link.addEventListener('click', (e) => {
                        e.preventDefault();
                        fetchPpdbData(link.getAttribute('href'));
                    });
                });

                // Sortable table headers
                const sortHeaders = tableWrapper.querySelectorAll('.sort-header');
                sortHeaders.forEach(header => {
                    header.addEventListener('click', (e) => {
                        e.preventDefault();
                        const targetSortBy = header.getAttribute('data-sort');
                        
                        if (currentSortBy === targetSortBy) {
                            // Toggle order
                            currentSortOrder = currentSortOrder === 'asc' ? 'desc' : 'asc';
                        } else {
                            currentSortBy = targetSortBy;
                            currentSortOrder = 'asc';
                        }

                        // Update select selector value to match
                        sortSelector.value = `${currentSortBy}-${currentSortOrder}`;
                        
                        fetchPpdbData();
                    });
                });
            };

            // Lightbox events binding helper
            const bindLightboxEvents = () => {
                const docModal = document.getElementById('document-modal');
                const docModalImg = document.getElementById('document-modal-img');
                const docModalIframe = document.getElementById('document-modal-iframe');
                const docModalTitle = document.getElementById('document-modal-title');
                const docLinks = document.querySelectorAll('.view-document');

                if (docModal && docModalTitle && docLinks.length > 0) {
                    docLinks.forEach(link => {
                        // Remove existing listeners by cloning
                        const newLink = link.cloneNode(true);
                        link.parentNode.replaceChild(newLink, link);
                        
                        newLink.addEventListener('click', (e) => {
                            e.preventDefault();
                            const fileUrl = newLink.getAttribute('href');
                            const docTitle = newLink.getAttribute('data-title') || 'Pratinjau Dokumen';
                            
                            docModalTitle.innerHTML = `<i class="fa-solid fa-file-invoice text-gold"></i> ${docTitle}`;
                            
                            // Check if file is PDF
                            const isPdf = fileUrl.toLowerCase().endsWith('.pdf');
                            if (isPdf) {
                                if (docModalImg) docModalImg.style.display = 'none';
                                if (docModalIframe) {
                                    docModalIframe.src = fileUrl;
                                    docModalIframe.style.display = 'block';
                                }
                            } else {
                                if (docModalIframe) {
                                    docModalIframe.src = '';
                                    docModalIframe.style.display = 'none';
                                }
                                if (docModalImg) {
                                    docModalImg.src = fileUrl;
                                    docModalImg.style.display = 'block';
                                }
                            }
                            
                            docModal.classList.add('active');
                            document.body.style.overflow = 'hidden'; // Lock scrolling
                        });
                    });
                }
            };

            const closeModal = () => {
                const docModal = document.getElementById('document-modal');
                const docModalImg = document.getElementById('document-modal-img');
                const docModalIframe = document.getElementById('document-modal-iframe');
                if (docModal) {
                    docModal.classList.remove('active');
                    if (docModalImg) docModalImg.src = '';
                    if (docModalIframe) docModalIframe.src = ''; // Clear iframe src to stop background loading
                    document.body.style.overflow = ''; // Unlock scrolling
                }
            };

            const closeBtn = document.getElementById('close-document-modal');
            if (closeBtn) {
                closeBtn.addEventListener('click', closeModal);
            }

            const docModal = document.getElementById('document-modal');
            if (docModal) {
                docModal.addEventListener('click', (e) => {
                    if (e.target === docModal) {
                        closeModal();
                    }
                });
            }

            // Biodata detail events binding helper
            const bindBiodataEvents = () => {
                const biodataModal = document.getElementById('biodata-modal');
                const biodataModalContent = document.getElementById('biodata-modal-content');
                const biodataLinks = document.querySelectorAll('.view-biodata');

                if (biodataModal && biodataModalContent && biodataLinks.length > 0) {
                    biodataLinks.forEach(link => {
                        // Remove existing listeners by cloning
                        const newLink = link.cloneNode(true);
                        link.parentNode.replaceChild(newLink, link);

                        newLink.addEventListener('click', (e) => {
                            e.preventDefault();
                            const studentData = JSON.parse(newLink.getAttribute('data-student'));
                            
                            // Check if student has biodata filled
                            if (!studentData.nik) {
                                alert('Siswa ini belum mengisi biodata kependudukan.');
                                return;
                            }

                            // Generate HTML structure for biodata grid
                            let html = `
                                <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 1.5rem; margin-bottom: 2rem;">
                                    <!-- Data Pribadi -->
                                    <div style="grid-column: span 2; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.25rem; font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; margin-top: 0.5rem;">
                                        <i class="fa-solid fa-user text-gold" style="margin-right: 0.5rem;"></i> A. Data Pribadi Calon Siswa
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nama Lengkap:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.name || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">NISN:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.nisn || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">NIK:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.nik || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Jenis Kelamin:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.gender || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Agama:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.religion || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nomor Handphone:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.phone || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Tempat, Tanggal Lahir:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.birth_place || '-'}, ${studentData.birth_date ? formatDate(studentData.birth_date) : '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Jenis Tinggal:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.stay_type || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Kecamatan / Kelurahan:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.district || '-'} / ${studentData.subdistrict || '-'}</span>
                                    </div>
                                    <div style="grid-column: span 2;">
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Alamat Lengkap Peserta Didik:</strong>
                                        <span style="font-size: 0.95rem; color: var(--text-dark);">${studentData.address || '-'}</span>
                                    </div>

                                    <!-- Data Ayah -->
                                    <div style="grid-column: span 2; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.25rem; font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; margin-top: 1rem;">
                                        <i class="fa-solid fa-user-tie text-gold" style="margin-right: 0.5rem;"></i> B. Data Ayah Kandung
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nama Ayah:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.father_name || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pendidikan Ayah:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.father_education || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pekerjaan Ayah:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.father_job || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Penghasilan Ayah:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.father_income || '-'}</span>
                                    </div>

                                    <!-- Data Ibu -->
                                    <div style="grid-column: span 2; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.25rem; font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; margin-top: 1rem;">
                                        <i class="fa-solid fa-user-group text-gold" style="margin-right: 0.5rem;"></i> C. Data Ibu Kandung
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nama Ibu:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.mother_name || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pendidikan Ibu:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.mother_education || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pekerjaan Ibu:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.mother_job || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Penghasilan Ibu:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.mother_income || '-'}</span>
                                    </div>
                                    <div style="grid-column: span 2;">
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Alamat Orang Tua:</strong>
                                        <span style="font-size: 0.95rem; color: var(--text-dark);">${studentData.parent_address || '-'}</span>
                                    </div>

                                    <!-- Data Wali -->
                                    <div style="grid-column: span 2; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.25rem; font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; margin-top: 1rem;">
                                        <i class="fa-solid fa-user-shield text-gold" style="margin-right: 0.5rem;"></i> D. Data Wali
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nama Wali:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.guardian_name || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pendidikan Wali:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.guardian_education || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Pekerjaan Wali:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.guardian_job || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Penghasilan Wali:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.guardian_income || '-'}</span>
                                    </div>
                                    <div style="grid-column: span 2;">
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Alamat Wali:</strong>
                                        <span style="font-size: 0.95rem; color: var(--text-dark);">${studentData.guardian_address || '-'}</span>
                                    </div>

                                    <!-- Program Bantuan -->
                                    <div style="grid-column: span 2; border-bottom: 2px solid var(--primary-color); padding-bottom: 0.25rem; font-weight: 700; color: var(--primary-dark); font-size: 1.1rem; margin-top: 1rem;">
                                        <i class="fa-solid fa-hand-holding-hand text-gold" style="margin-right: 0.5rem;"></i> E. Data Program Bantuan
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Penerima KPS:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.is_kps || 'Tidak'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nomor KPS:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.kps_number || '-'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Penerima KIP:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.is_kip || 'Tidak'}</span>
                                    </div>
                                    <div>
                                        <strong style="display: block; font-size: 0.8rem; color: var(--text-muted);">Nomor KIP:</strong>
                                        <span style="font-size: 0.95rem; font-weight: 600; color: var(--text-dark);">${studentData.kip_number || '-'}</span>
                                    </div>
                                </div>
                            `;

                            biodataModalContent.innerHTML = html;
                            biodataModal.classList.add('active');
                            document.body.style.overflow = 'hidden'; // Lock scrolling
                        });
                    });
                }
            };

            const closeBiodataModal = () => {
                const biodataModal = document.getElementById('biodata-modal');
                const biodataModalContent = document.getElementById('biodata-modal-content');
                if (biodataModal) {
                    biodataModal.classList.remove('active');
                    if (biodataModalContent) biodataModalContent.innerHTML = '';
                    document.body.style.overflow = ''; // Unlock scrolling
                }
            };

            const closeBiodataBtn = document.getElementById('close-biodata-modal');
            if (closeBiodataBtn) {
                closeBiodataBtn.addEventListener('click', closeBiodataModal);
            }

            const biodataModal = document.getElementById('biodata-modal');
            if (biodataModal) {
                biodataModal.addEventListener('click', (e) => {
                    if (e.target === biodataModal) {
                        closeBiodataModal();
                    }
                });
            }

            // Format date helper (YYYY-MM-DD to DD MMM YYYY)
            const formatDate = (dateStr) => {
                if (!dateStr) return '-';
                try {
                    const dStr = dateStr.split('T')[0];
                    const parts = dStr.split('-');
                    if (parts.length === 3) {
                        const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agu', 'Sep', 'Okt', 'Nov', 'Des'];
                        const day = parseInt(parts[2]);
                        const month = months[parseInt(parts[1]) - 1];
                        const year = parts[0];
                        return `${day} ${month} ${year}`;
                    }
                    return dateStr;
                } catch(e) {
                    return dateStr;
                }
            };

            // Verification modal events binding helper
            const bindVerificationEvents = () => {
                const modal = document.getElementById('verification-modal');
                const form = document.getElementById('verify-form');
                const studentNameSpan = document.getElementById('verify-student-name');
                const studentNisnSpan = document.getElementById('verify-student-nisn');
                const statusOk = document.getElementById('verify-status-ok');
                const statusRevisi = document.getElementById('verify-status-revisi');
                const notesContainer = document.getElementById('verify-notes-container');
                const notesTextarea = document.getElementById('verify-notes-textarea');
                const adminNotesTextarea = document.getElementById('verify-admin-notes');
                const allowEditCheckbox = document.getElementById('verify-allow-edit');
                const openButtons = document.querySelectorAll('.open-verify-modal');

                if (modal && openButtons.length > 0) {
                    openButtons.forEach(btn => {
                        btn.addEventListener('click', (e) => {
                            e.preventDefault();
                            const student = JSON.parse(btn.getAttribute('data-student'));
                            
                            // Set student info
                            studentNameSpan.textContent = student.name;
                            studentNisnSpan.textContent = student.nisn;
                            
                            // Set action URL
                            form.action = `/admin/ppdb/student/${student.id}/verify`;
                            
                            // Reset state
                            statusOk.checked = false;
                            statusRevisi.checked = false;
                            notesContainer.style.display = 'none';
                            notesTextarea.required = false;
                            notesTextarea.value = student.verification_notes || '';
                            adminNotesTextarea.value = student.admin_notes || '';
                            
                            // Preselect status if already verified or rejected
                            if (student.verification_status === 'verified') {
                                statusOk.checked = true;
                                allowEditCheckbox.checked = false;
                            } else if (student.verification_status === 'rejected') {
                                statusRevisi.checked = true;
                                notesContainer.style.display = 'block';
                                notesTextarea.required = true;
                                allowEditCheckbox.checked = true;
                            } else {
                                allowEditCheckbox.checked = false;
                            }
                            
                            modal.classList.add('active');
                            document.body.style.overflow = 'hidden';
                        });
                    });
                }

                // Close button event
                const closeBtn = document.getElementById('close-verification-modal');
                if (closeBtn) {
                    closeBtn.addEventListener('click', () => {
                        modal.classList.remove('active');
                        document.body.style.overflow = '';
                    });
                }

                // Outside click close
                if (modal) {
                    modal.addEventListener('click', (e) => {
                        if (e.target === modal) {
                            modal.classList.remove('active');
                            document.body.style.overflow = '';
                        }
                    });
                }

                // Radio buttons change event
                if (statusOk && statusRevisi) {
                    statusOk.addEventListener('change', () => {
                        if (statusOk.checked) {
                            notesContainer.style.display = 'none';
                            notesTextarea.required = false;
                            allowEditCheckbox.checked = false;
                        }
                    });

                    statusRevisi.addEventListener('change', () => {
                        if (statusRevisi.checked) {
                            notesContainer.style.display = 'block';
                            notesTextarea.required = true;
                            allowEditCheckbox.checked = true;
                        }
                    });
                }
            };

            // Run initial bindings
            bindTableWrapperEvents();
            bindLightboxEvents();
            bindBiodataEvents();
            bindVerificationEvents();
        });
    </script>
</body>
</html>
