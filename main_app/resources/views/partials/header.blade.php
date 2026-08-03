<!-- Top Bar -->
<div class="top-bar">
    <div class="container">
        <div class="top-bar-info">
            <a href="mailto:info@sman1-tpi.sch.id"><i class="fa-solid fa-envelope text-gold"></i> info@sman1-tpi.sch.id</a>
            <a href="tel:+6277121616"><i class="fa-solid fa-phone text-gold"></i> +62-0771-21216</a>
        </div>
        
        <div class="top-bar-portal">
            <a href="https://osis.sman1-tpi.sch.id" target="_blank" class="portal-link">OSIS</a>
            <a href="#" class="portal-link">Forums</a>
            <a href="https://pustaka.sman1-tpi.sch.id" target="_blank" class="portal-link">e-Library</a>
            <a href="http://rapor.sman1-tpi.sch.id" target="_blank" class="portal-link">e-Rapor</a>
            <a href="http://lms.sman1-tpi.sch.id" target="_blank" class="portal-link">e-Learning</a>
        </div>

        <div class="top-bar-socials">
            <a href="https://facebook.com" target="_blank" aria-label="Facebook"><i class="fa-brands fa-facebook-f"></i></a>
            <a href="https://twitter.com" target="_blank" aria-label="Twitter"><i class="fa-brands fa-twitter"></i></a>
            <a href="https://instagram.com" target="_blank" aria-label="Instagram"><i class="fa-brands fa-instagram"></i></a>
            <a href="https://pinterest.com" target="_blank" aria-label="Pinterest"><i class="fa-brands fa-pinterest"></i></a>
        </div>
    </div>
</div>

<!-- Main Sticky Header -->
<header class="main-header">
    <div class="container">
        <nav class="navbar">
            <!-- School Logo & Branding -->
            <a href="{{ route('home') }}" class="logo" aria-label="Beranda SMAN 1 Tanjungpinang">
                <img src="{{ asset('images/logo.png') }}" alt="Logo SMA Negeri 1 Tanjungpinang" style="width: 50px; height: 50px; object-fit: contain;">
                <div class="logo-text">
                    <h1>SMA Negeri 1</h1>
                    <span>Tanjungpinang</span>
                </div>
            </a>

            <!-- Navigation Links -->
            <ul class="nav-menu">
                <li class="nav-item {{ Request::routeIs('home') ? 'active' : '' }}">
                    <a href="{{ route('home') }}" class="nav-link">Home</a>
                </li>
                
                <li class="nav-item">
                    <a href="#" class="nav-link">Profile <i class="fa-solid fa-chevron-down" style="font-size: 0.7rem;"></i></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{ route('profile', ['tab' => 'sejarah']) }}" class="dropdown-link">Sejarah Singkat</a></li>
                        <li><a href="{{ route('profile', ['tab' => 'potensi']) }}" class="dropdown-link">Keadaan & Potensi</a></li>
                        <li><a href="{{ route('profile', ['tab' => 'visimisi']) }}" class="dropdown-link">Visi & Misi</a></li>
                        <li><a href="{{ route('profile', ['tab' => 'target']) }}" class="dropdown-link">Tujuan & Target</a></li>
                        <li><a href="{{ route('profile', ['tab' => 'sasaran']) }}" class="dropdown-link">Sasaran Program</a></li>
                        <li><a href="{{ route('profile', ['tab' => 'motto']) }}" class="dropdown-link">Motto Sekolah</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('academics') }}" class="nav-link">Akademik</a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('facilities') }}" class="nav-link">Sarana & Prasarana</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}#berita" class="nav-link">Berita</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}#prestasi" class="nav-link">Prestasi</a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('home') }}#kontak" class="nav-link">Kontak</a>
                </li>

                <li class="nav-item" style="margin-left: 1rem;">
                    <a href="{{ route('admin.login') }}" class="btn-accent" style="padding: 0.45rem 1.15rem; font-size: 0.85rem;"><i class="fa-solid fa-lock" style="font-size: 0.75rem;"></i> Admin</a>
                </li>
            </ul>

            <!-- Mobile Hamburger Button -->
            <button class="menu-toggle" aria-label="Toggle Navigation">
                <span></span>
                <span></span>
                <span></span>
            </button>
        </nav>
    </div>
</header>
