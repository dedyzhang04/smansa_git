<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil & Statistik Sekolah – SMAN 1 Tanjungpinang</title>
    
    <!-- CSS Assets (Direct import bypasses Vite) -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    <!-- FontAwesome 6 Icons CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* Custom Premium Tabs and Layout for Admin Profile */
        .profile-admin-container {
            display: flex;
            flex-direction: column;
            gap: 2rem;
        }
        
        .admin-profile-tabs {
            display: flex;
            border-bottom: 2px solid rgba(11, 99, 197, 0.08);
            gap: 1.5rem;
            margin-bottom: 1rem;
        }
        
        .admin-profile-tab-btn {
            background: none;
            border: none;
            padding: 0.75rem 1.5rem;
            font-family: var(--font-heading);
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-muted);
            cursor: pointer;
            border-bottom: 3px solid transparent;
            transition: var(--transition-smooth);
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .admin-profile-tab-btn:hover, .admin-profile-tab-btn.active {
            color: var(--primary-color);
            border-bottom-color: var(--primary-color);
        }
        
        .admin-profile-tab-content {
            display: none;
        }
        
        .admin-profile-tab-content.active {
            display: block;
            animation: fadeIn 0.4s ease-in-out;
        }
        
        /* Stats Form Grid */
        .stats-form-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-bottom: 2rem;
        }
        
        /* Profile Detail View layout */
        .profile-view-layout {
            display: grid;
            grid-template-columns: 280px 1fr;
            gap: 2rem;
            align-items: start;
        }
        
        .profile-view-sidebar {
            background-color: var(--bg-white);
            border-radius: 12px;
            padding: 1rem;
            border: 1px solid rgba(11, 99, 197, 0.05);
            box-shadow: 0 4px 15px rgba(0,0,0,0.02);
        }
        
        .profile-view-link {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.8rem 1.2rem;
            border-radius: 8px;
            font-family: var(--font-heading);
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--text-dark);
            cursor: pointer;
            margin-bottom: 0.5rem;
            transition: var(--transition-smooth);
            border-left: 4px solid transparent;
        }
        
        .profile-view-link:hover, .profile-view-link.active {
            background-color: rgba(11, 99, 197, 0.05);
            color: var(--primary-color);
            border-left-color: var(--primary-color);
        }
        
        .profile-view-link:last-child {
            margin-bottom: 0;
        }
        
        .profile-view-content {
            background-color: var(--bg-white);
            border-radius: 16px;
            padding: 2.5rem;
            border: 1px solid rgba(11, 99, 197, 0.05);
            box-shadow: 0 10px 30px rgba(0,0,0,0.03);
            min-height: 450px;
        }
        
        .profile-doc-tab {
            display: none;
        }
        
        .profile-doc-tab.active {
            display: block;
            animation: fadeIn 0.3s ease-in-out;
        }
        
        .profile-doc-tab h2 {
            font-size: 1.8rem;
            margin-bottom: 1.5rem;
            position: relative;
            padding-bottom: 0.75rem;
            border-bottom: 1px solid rgba(0,0,0,0.05);
        }
        
        .profile-doc-tab h2::after {
            content: '';
            position: absolute;
            bottom: -1px;
            left: 0;
            width: 60px;
            height: 3px;
            background-color: var(--accent-color);
        }
        
        .profile-doc-tab h3 {
            font-size: 1.15rem;
            color: var(--primary-color);
            margin-top: 1.75rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .profile-doc-tab p {
            line-height: 1.7;
            color: #334155;
            text-align: justify;
            margin-bottom: 1.25rem;
            font-size: 0.95rem;
        }
        
        .profile-doc-tab ul, .profile-doc-tab ol {
            padding-left: 1.5rem;
            margin-bottom: 1.5rem;
            line-height: 1.7;
            font-size: 0.95rem;
            color: #334155;
        }
        
        .profile-doc-tab li {
            margin-bottom: 0.5rem;
            text-align: justify;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(5px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @media (max-width: 992px) {
            .profile-view-layout {
                grid-template-columns: 1fr;
            }
            
            .stats-form-grid {
                grid-template-columns: 1fr;
            }
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
                    <h1 style="font-size: 1.5rem; color: var(--primary-dark);">Profil & Statistik Sekolah</h1>
                    <p style="font-size: 0.85rem; color: var(--text-muted);">Kelola statistik beranda dan lihat seluruh lembar data profil sekolah SMAN 1 Tanjungpinang.</p>
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
                
                <div class="profile-admin-container">
                    
                    <!-- Navigation Tabs -->
                    <div class="admin-profile-tabs">
                        <button class="admin-profile-tab-btn active" data-tab-id="edit-stats">
                            <i class="fa-solid fa-sliders"></i> Kelola Statistik Landing
                        </button>
                        <button class="admin-profile-tab-btn" data-tab-id="view-profile">
                            <i class="fa-solid fa-book-open"></i> Lihat Profil Lengkap SMANSA
                        </button>
                    </div>
                    
                    <!-- Tab Content 1: Edit Stats -->
                    <div id="edit-stats" class="admin-profile-tab-content active">
                        <div class="admin-card" style="max-width: 800px;">
                            <h3 style="font-size: 1.25rem; color: var(--primary-dark); margin-bottom: 1.5rem;"><i class="fa-solid fa-sliders text-gold"></i> Sunting Statistik Counter</h3>
                            
                            <form action="{{ route('admin.profile.update') }}" method="POST">
                                @csrf
                                
                                <div class="stats-form-grid">
                                    <!-- Siswa Aktif -->
                                    <div class="form-group">
                                        <label for="siswa_aktif">Jumlah Siswa Aktif *</label>
                                        <input type="number" id="siswa_aktif" name="siswa_aktif" class="form-control" value="{{ old('siswa_aktif', $stats['siswa_aktif']) }}" required min="1">
                                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Ditampilkan dengan simbol "+" otomatis di beranda.</p>
                                    </div>
                                    
                                    <!-- Guru & Staff -->
                                    <div class="form-group">
                                        <label for="guru_staff">Jumlah Guru & Staff *</label>
                                        <input type="number" id="guru_staff" name="guru_staff" class="form-control" value="{{ old('guru_staff', $stats['guru_staff']) }}" required min="1">
                                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Total staf pendidik dan tata usaha aktif.</p>
                                    </div>
                                    
                                    <!-- Ruang Kelas / Rombel -->
                                    <div class="form-group">
                                        <label for="ruang_kelas">Jumlah Rombel / Ruang Kelas *</label>
                                        <input type="number" id="ruang_kelas" name="ruang_kelas" class="form-control" value="{{ old('ruang_kelas', $stats['ruang_kelas']) }}" required min="1">
                                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Total rombongan belajar aktif sekolah.</p>
                                    </div>
                                    
                                    <!-- Akreditasi -->
                                    <div class="form-group">
                                        <label for="akreditasi">Akreditasi BAN-SM *</label>
                                        <select id="akreditasi" name="akreditasi" class="form-control" required style="-webkit-appearance: none; appearance: none; background-image: url('data:image/svg+xml;utf8,<svg fill=%22%23044a27%22 height=%2224%22 viewBox=%220 0 24 24%22 width=%2224%22 xmlns=%22http://www.w3.org/2000/svg%22><path d=%22M7 10l5 5 5-5z%22/><path d=%22M0 0h24v24H0z%22 fill=%22none%22/></svg>'); background-repeat: no-repeat; background-position: right 1rem center; background-size: 1.25rem;">
                                            <option value="A" {{ $stats['akreditasi'] === 'A' ? 'selected' : '' }}>A (Amat Baik)</option>
                                            <option value="B" {{ $stats['akreditasi'] === 'B' ? 'selected' : '' }}>B (Baik)</option>
                                            <option value="C" {{ $stats['akreditasi'] === 'C' ? 'selected' : '' }}>C (Cukup)</option>
                                            <option value="Belum Terakreditasi" {{ $stats['akreditasi'] === 'Belum Terakreditasi' ? 'selected' : '' }}>Belum Terakreditasi</option>
                                        </select>
                                        <p style="font-size: 0.75rem; color: var(--text-muted); margin-top: 0.25rem;">Peringkat akreditasi resmi sekolah saat ini.</p>
                                    </div>
                                </div>
                                
                                <div style="border-top: 1px solid rgba(0,0,0,0.05); padding-top: 1.5rem; display: flex; justify-content: flex-end;">
                                    <button type="submit" class="btn-accent" style="padding: 0.75rem 2rem;">
                                        Simpan Perubahan Statistik <i class="fa-solid fa-circle-check"></i>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                    
                    <!-- Tab Content 2: View Profile (Read-Only) -->
                    <div id="view-profile" class="admin-profile-tab-content">
                        
                        <div class="profile-view-layout">
                            <!-- Sidebar profile navigation -->
                            <aside class="profile-view-sidebar">
                                <div class="profile-view-link active" data-doc-tab="doc-sejarah">
                                    <span>Sejarah Singkat</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                                <div class="profile-view-link" data-doc-tab="doc-potensi">
                                    <span>Keadaan & Potensi</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                                <div class="profile-view-link" data-doc-tab="doc-visimisi">
                                    <span>Visi & Misi</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                                <div class="profile-view-link" data-doc-tab="doc-target">
                                    <span>Tujuan & Target</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                                <div class="profile-view-link" data-doc-tab="doc-sasaran">
                                    <span>Sasaran Program</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                                <div class="profile-view-link" data-doc-tab="doc-motto">
                                    <span>Motto Sekolah</span> <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                                </div>
                            </aside>
                            
                            <!-- Profile document cards -->
                            <div class="profile-view-content">
                                
                                <!-- Doc 1: Sejarah -->
                                <div id="doc-sejarah" class="profile-doc-tab active">
                                    <h2>Sejarah SMA Negeri 1 Tanjungpinang</h2>
                                    <h3><i class="fa-solid fa-book-open"></i> PENDAHULUAN</h3>
                                    <p>
                                        SMA Negeri 1 Tanjungpinang terletak di Jl. dr. Soetomo Kelurahan Bukit Cermin Kecamatan Tanjungpinang Barat, Kota Tanjungpinang Provinsi Kepulauan Riau. Sekolah ini merupakan sekolah tertua di Provinsi Kepulauan Riau yang didirikan pada tanggal 16 Agustus 1956, satu tahun sebelum Provinsi Riau terbentuk berdasarkan UU darurat tanggal 9 Agustus 1957.
                                    </p>
                                    <p>
                                        Pada awal berdirinya sebelum bangunan sekolah didirikan di jalan dr. Soetomo, sekolah ini diselenggarakan dengan menumpang SD Negeri 6 Tanjungpinang yang beralamat di Jl. MT Haryono Km 3,5 Tanjungpinang pada siang hingga sore hari. Pada tahun 1958, sekolah mulai menempati gedung baru di Jalan dr. Soetomo dengan jumlah ruang sebanyak 6 ruang. Pada Tahun 1979, SMA Negeri Tanjungpinang secara resmi berubah nama menjadi SMA Negeri 1 Tanjungpinang.
                                    </p>
                                    
                                    <h3><i class="fa-solid fa-diagram-project"></i> PELAKSANA PROGRAM</h3>
                                    <p>
                                        Dalam perkembangannya, SMA Negeri 1 Tanjungpinang tumbuh menjadi sekolah percontohan berakreditasi A (Amat Baik) dan seringkali dipercaya oleh Kementerian Pendidikan untuk menjalankan program-program rintisan penting nasional, antara lain:
                                    </p>
                                    <ul>
                                        <li><strong>SMA Binaan Khusus (1995/1996)</strong> berdasarkan Surat Keputusan Kepala Kantor Wilayah Departemen Pendidikan Provinsi Riau.</li>
                                        <li><strong>Sekolah Rintisan Bertaraf Internasional / RSBI (2007)</strong> berdasarkan Surat Keputusan Direktorat Pembinaan SMA Departemen Pendidikan Nasional.</li>
                                        <li><strong>Sekolah Rintisan Pelaksana Kurikulum 2013 (2013)</strong>.</li>
                                        <li><strong>Sekolah Kewirausahaan (2016-2017)</strong> dan <strong>Sekolah Rujukan (2018)</strong> dari Kemendikbud RI.</li>
                                    </ul>
                                </div>
                                
                                <!-- Doc 2: Keadaan & Potensi -->
                                <div id="doc-potensi" class="profile-doc-tab">
                                    <h2>Keadaan & Potensi Sekolah</h2>
                                    <p>
                                        SMA Negeri 1 Tanjungpinang berlokasi strategis di pusat administrasi dan pemerintahan Provinsi Kepulauan Riau, tepatnya di Kecamatan Tanjungpinang Barat. Kawasan Pulau Bintan ini dikenal sangat strategis karena termasuk dalam Zona Ekonomi Khusus (ZEK) yang berbatasan langsung dengan Singapura dan Malaysia (Johor).
                                    </p>
                                    <p>
                                        Tata kota Tanjungpinang yang sangat rapi serta infrastruktur pendukung yang sangat mapan memberikan lingkungan belajar mengajar yang kondusif. Potensi daerah yang paling menonjol dari Kota Tanjungpinang adalah kekayaan kepariwisataan sejarah dan budaya Melayu seperti situs warisan dunia di Pulau Penyengat, keasrian pantai Trikora, dan kawasan resor internasional Lagoi.
                                    </p>
                                    <p>
                                        Letak sekolah yang asri serta dekat dengan pusat budaya memberikan inspirasi luas bagi pengembangan karakter dan kreativitas siswa berlandaskan kearifan lokal yang berwawasan global.
                                    </p>
                                </div>
                                
                                <!-- Doc 3: Visi Misi -->
                                <div id="doc-visimisi" class="profile-doc-tab">
                                    <h2>Visi & Misi SMAN 1 Tanjungpinang</h2>
                                    <div style="background-color: rgba(11, 99, 197, 0.02); border-left: 4px solid var(--accent-color); padding: 1.25rem 1.75rem; border-radius: 8px; margin-bottom: 2rem;">
                                        <h4 style="margin: 0 0 0.5rem 0; color: var(--primary-dark); font-size: 1.1rem; font-weight: 700;">VISI SEKOLAH</h4>
                                        <p style="font-size: 1.1rem; font-style: italic; font-weight: 600; color: var(--primary-color); margin-bottom: 0; text-align: justify; line-height: 1.6;">
                                            "Menjadi sekolah Adhiwiyata Mandiri, Sehat, Unggul dalam Disiplin dan Prestasi, Berwawasan IMTAQ, IPTEK dan Seni, Bersendikan Karakter Budaya Bangsa."
                                        </p>
                                    </div>
                                    
                                    <h3><i class="fa-solid fa-list-check"></i> MISI SEKOLAH</h3>
                                    <ol>
                                        <li>Meningkatkan Keimanan dan Ketaqwaan terhadap Tuhan Yang Maha Esa.</li>
                                        <li>Meningkatkan Wawasan kebangsaan dan cinta tanah air.</li>
                                        <li>Meningkatkan karakter kemandirian, kerja keras dan kepemimpinan.</li>
                                        <li>Memperkaya Kurikulum Berwawasan Lingkungan dengan Budaya Karakter Bangsa Kearifan Lokal Melayu.</li>
                                        <li>Mengembangkan kultur sekolah disiplin melalui budaya 5S (Senyum, Sapa, Salam, Sopan, Santun).</li>
                                        <li>Mengembangkan sistem pembelajaran berbasis Teknologi Informasi yang kreatif dan dinamis.</li>
                                        <li>Menghasilkan lulusan berkualitas tinggi yang berdaya saing di perguruan tinggi terkemuka.</li>
                                    </ol>
                                </div>
                                
                                <!-- Doc 4: Tujuan & Target -->
                                <div id="doc-target" class="profile-doc-tab">
                                    <h2>Tujuan & Target Strategis</h2>
                                    <h3><i class="fa-solid fa-bullseye"></i> TUJUAN SEKOLAH</h3>
                                    <ol>
                                        <li>Menyediakan sarana prasarana pendidikan yang memadai dan modern.</li>
                                        <li>Melaksanakan proses belajar mengajar secara efektif, efisien, inovatif berlandaskan kearifan lokal.</li>
                                        <li>Meningkatkan kinerja masing-masing komponen sekolah sesuai Tupoksi dengan semangat kolaboratif.</li>
                                        <li>Meningkatkan program ekstrakurikuler guna mewadahi minat bakat kepemimpinan siswa secara maksimal.</li>
                                        <li>Mewujudkan kelulusan yang berdaya saing global dan melanjutkan ke jenjang perguruan tinggi terakreditasi tinggi.</li>
                                    </ol>
                                    
                                    <h3><i class="fa-solid fa-star"></i> TARGET SEKOLAH</h3>
                                    <p>
                                        Mewujudkan komitmen peningkatan terpadu <strong>3P (Penampilan, Pelayanan, dan Prestasi)</strong> di seluruh unit pembelajaran, administrasi, dan kemitraan demi menjaga martabat sekolah unggul di tingkat nasional.
                                    </p>
                                </div>
                                
                                <!-- Doc 5: Sasaran Program -->
                                <div id="doc-sasaran" class="profile-doc-tab">
                                    <h2>Sasaran Program & Rencana Strategis</h2>
                                    <p>
                                        Untuk mewujudkan visi jangka panjang, SMAN 1 Tanjungpinang menetapkan pilar sasaran program berkesinambungan yang terbagi sebagai berikut:
                                    </p>
                                    <ul>
                                        <li><strong>Program Jangka Pendek (1 Tahun)</strong>: Penyelenggaraan rintisan bertaraf internasional secara solid, tingkat kelulusan siswa 100%, serta 90% lulusan berhasil menembus seleksi perguruan tinggi negeri terbaik.</li>
                                        <li><strong>Program Jangka Menengah (4 Tahun)</strong>: Terpenuhinya secara utuh 8 Standar Nasional Pendidikan (SNP) secara prima, prestasi olimpiade sains tingkat nasional, serta kepemilikan gedung modern terpadu berbasis IT.</li>
                                        <li><strong>Program Jangka Panjang (8 Tahun)</strong>: Menjadi ikon SMA Bertaraf Internasional yang unggul dengan tenaga pendidik bersertifikasi profesional global yang aktif berbahasa Inggris serta bersertifikasi IT.</li>
                                    </ul>
                                </div>
                                
                                <!-- Doc 6: Motto Sekolah -->
                                <div id="doc-motto" class="profile-doc-tab">
                                    <h2>Motto & Budaya Prestasi Sekolah</h2>
                                    <h3>1. CERGAS</h3>
                                    <p>
                                        Merupakan singkatan dari <strong>Cerdas, Enerjik, Religius, Globalisasi, Amanah, dan Sinergi</strong>. SMAN 1 menanamkan keimanan agamis yang kuat, ketangguhan jasmani, serta kecerdasan akademik global yang dibungkus dengan budaya kolaborasi silaturahmi yang mesra di antara seluruh warga sekolah.
                                    </p>
                                    
                                    <h3>2. CERDAS PENUH GAGASAN</h3>
                                    <p>
                                        Sebuah pilar filosofis yang mendorong para pelajar dan alumni SMAN 1 Tanjungpinang memiliki keunggulan intelektual yang kaya akan inovasi nyata dan daya cipta tinggi demi menjawab tantangan perubahan zaman secara mandiri.
                                    </p>
                                    
                                    <h3>3. MAJU BERSAMA, HEBAT SEMUA</h3>
                                    <p>
                                        Semangat kesetaraan, gotong royong, dan sinergi pembelajaran di mana kelulusan dan keberhasilan dinilai sebagai keberhasilan kolektif untuk melahirkan aset terbaik bagi kejayaan daerah Kepulauan Riau dan Indonesia.
                                    </p>
                                </div>
                                
                            </div>
                        </div>
                        
                    </div>
                    
                </div>

            </div>
        </main>

    </div>

    <!-- Tab Logic Script (Vanilla JS) -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Main Admin Tabs Switcher
            const mainTabs = document.querySelectorAll('.admin-profile-tab-btn');
            const mainContents = document.querySelectorAll('.admin-profile-tab-content');
            
            mainTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetTabId = this.getAttribute('data-tab-id');
                    
                    // Toggle active classes on buttons
                    mainTabs.forEach(btn => btn.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Toggle active classes on contents
                    mainContents.forEach(content => {
                        if (content.id === targetTabId) {
                            content.classList.add('active');
                        } else {
                            content.classList.remove('active');
                        }
                    });
                });
            });
            
            // Read-Only Profile View Tabs Switcher
            const docTabs = document.querySelectorAll('.profile-view-link');
            const docContents = document.querySelectorAll('.profile-doc-tab');
            
            docTabs.forEach(tab => {
                tab.addEventListener('click', function() {
                    const targetDocId = this.getAttribute('data-doc-tab');
                    
                    // Toggle active classes on links
                    docTabs.forEach(link => link.classList.remove('active'));
                    this.classList.add('active');
                    
                    // Toggle active classes on doc cards
                    docContents.forEach(doc => {
                        if (doc.id === targetDocId) {
                            doc.classList.add('active');
                        } else {
                            doc.classList.remove('active');
                        }
                    });
                });
            });
        });
    </script>
    <script src="{{ asset('js/admin.js') }}"></script>
</body>
</html>
