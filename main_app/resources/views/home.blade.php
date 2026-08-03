@extends('layouts.app')

@section('title', 'SMA Negeri 1 Tanjungpinang – Situs Resmi SMAN 1 Tanjungpinang')

@section('preload')
    @php
        $firstSlide = $articles->where('is_featured', true)->first() ?? $articles->first();
    @endphp
    @if($firstSlide)
        <link rel="preload" as="image" href="{{ $firstSlide->image }}">
    @endif
@endsection

@section('content')

    <!-- Hero Slider Section -->
    <section class="hero-slider">
        @php
            $slides = $articles->where('is_featured', true)->values();
            if($slides->isEmpty()) {
                $slides = $articles->take(3)->values();
            }
        @endphp
        
        @foreach($slides as $index => $slide)
            <div class="slide {{ $index === 0 ? 'active' : '' }}">
                <img src="{{ $slide->image }}" class="slide-image" alt="{{ $slide->title }}">
                <div class="slide-content">
                    <h2>{{ $slide->title }}</h2>
                    <p>{{ Str::limit(strip_tags($slide->content), 150) }}</p>
                    <div class="slide-buttons">
                        <a href="#berita" class="btn-accent">Baca Selengkapnya <i class="fa-solid fa-arrow-right"></i></a>
                        <a href="{{ route('profile', ['tab' => 'visimisi']) }}" class="btn-primary" style="background: rgba(255,255,255,0.15); border-color: rgba(255,255,255,0.3); color: #fff;">Profil Sekolah <i class="fa-solid fa-graduation-cap"></i></a>
                    </div>
                </div>
            </div>
        @endforeach

        <!-- Slider Navigation Controls -->
        <button class="slider-arrow slider-arrow-prev" aria-label="Slide Sebelumnya"><i class="fa-solid fa-chevron-left"></i></button>
        <button class="slider-arrow slider-arrow-next" aria-label="Slide Selanjutnya"><i class="fa-solid fa-chevron-right"></i></button>
        <div class="slider-dots"></div>
    </section>

    <!-- Portal Quick Access Section -->
    <section class="container">
        <div class="portal-grid">
            <!-- SPMB SMANSA -->
            <a href="{{ route('spmb.search') }}" class="portal-card">
                <div class="icon-box">
                    <i class="fa-solid fa-user-graduate"></i>
                </div>
                <h3>SPMB SMANSA</h3>
                <p>Sistem Penerimaan Murid Baru dan daftar ulang berkas siswa baru online.</p>
            </a>

            <!-- Forums -->
            <a href="#" class="portal-card">
                <div class="icon-box">
                    <i class="fa-solid fa-comments"></i>
                </div>
                <h3>Forums SMANSA</h3>
                <p>Wadah komunikasi, diskusi, dan silaturahmi seluruh warga sekolah.</p>
            </a>

            <!-- e-Library -->
            <a href="https://pustaka.smansa-tpi.sch.id" target="_blank" class="portal-card">
                <div class="icon-box">
                    <i class="fa-solid fa-book-open"></i>
                </div>
                <h3>e-Library</h3>
                <p>Akses pustaka digital, katalog buku, dan e-book belajar secara daring.</p>
            </a>

            <!-- e-Rapor -->
            <a href="http://rapor.smansa-tpi.sch.id" target="_blank" class="portal-card">
                <div class="icon-box">
                    <i class="fa-solid fa-file-invoice"></i>
                </div>
                <h3>e-Rapor</h3>
                <p>Sistem penilaian dan laporan hasil belajar siswa secara transparan.</p>
            </a>

            <!-- e-Learning -->
            <a href="http://lms.smansa-tpi.sch.id" target="_blank" class="portal-card">
                <div class="icon-box">
                    <i class="fa-solid fa-laptop-code"></i>
                </div>
                <h3>e-Learning</h3>
                <p>Learning Management System (LMS) untuk pembelajaran digital interaktif.</p>
            </a>
        </div>
    </section>

    <!-- Principal Welcome Section (Sambutan Kepala Sekolah) -->
    <section class="welcome-section">
        <div class="container">
            <div class="welcome-grid">
                <!-- Principal Image Card -->
                <div class="welcome-image-container">
                    <div class="welcome-img-card">
                        <img src="{{ asset('images/kepala_sekolah.jpg') }}" alt="Kepala Sekolah SMAN 1 Tanjungpinang">
                    </div>
                    <div class="welcome-name-card">
                        <h3>Drs. Kariadi</h3>
                        <p>Kepala SMAN 1 Tanjungpinang</p>
                    </div>
                </div>

                <!-- Principal Speech Text -->
                <div class="welcome-text">
                    <h2>Sambutan Kepala Sekolah</h2>
                    <div class="welcome-speech">
                        <p><strong>Assalamu'alaikum Warahmatullahi Wabarakatuh,</strong></p>
                        <p>
                            Puji syukur senantiasa kita panjatkan ke hadirat Allah SWT Tuhan Yang Maha Esa atas limpahan rahmat, hidayah, dan karunia-Nya kepada kita semua. Selamat datang di situs resmi SMA Negeri 1 Tanjungpinang.
                        </p>
                        <p>
                            Sebagai salah satu institusi pendidikan menengah tertua di Kepulauan Riau, SMA Negeri 1 Tanjungpinang berkomitmen penuh untuk menyelenggarakan layanan pendidikan bermutu tinggi guna melahirkan generasi cerdas, berkarakter Pancasila, tangguh, serta adaptif terhadap kemajuan sains dan teknologi global.
                        </p>
                        <p>
                            Melalui portal digital ini, kami berupaya menyajikan keterbukaan informasi publik mengenai profil sekolah, kurikulum Merdeka Belajar, sarana prasarana, serta ragam prestasi gemilang yang diraih oleh para siswa dan guru kami. Kami mengajak seluruh elemen pemangku kepentingan untuk berkolaborasi sinergis demi kejayaan pendidikan anak-anak kita.
                        </p>
                        <p><strong>Wassalamu'alaikum Warahmatullahi Wabarakatuh.</strong></p>
                    </div>
                    <div class="welcome-signature">
                        <p class="welcome-sig-text">Drs. Kariadi</p>
                        <p style="font-size: 0.85rem; color: var(--text-muted);">NIP. 19680512 199803 1 004</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- School Statistics Section (Gold Counters) -->
    <section class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <!-- Stat 1: Students -->
                <div class="stat-item">
                    <div class="stat-number" data-target="{{ $stats['siswa_aktif'] }}">0+</div>
                    <div class="stat-title">Siswa Aktif</div>
                </div>
                <!-- Stat 2: Teachers -->
                <div class="stat-item">
                    <div class="stat-number" data-target="{{ $stats['guru_staff'] }}">0</div>
                    <div class="stat-title">Guru & Staff</div>
                </div>
                <!-- Stat 3: Rombel/Classes -->
                <div class="stat-item">
                    <div class="stat-number" data-target="{{ $stats['ruang_kelas'] }}">0</div>
                    <div class="stat-title">Ruang Kelas</div>
                </div>
                <!-- Stat 4: Accreditation -->
                <div class="stat-item" style="display: flex; flex-direction: column; align-items: center; justify-content: center;">
                    <div class="stat-number" style="font-size: 3.5rem; line-height: 1.2;">{{ $stats['akreditasi'] }}</div>
                    <div class="stat-title">Akreditasi BAN-SM</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog & Berita Section (Filterable Grid) -->
    <section id="berita" class="blog-section">
        <div class="container">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem; text-align: left;">
                <div>
                    <h2>Berita & Artikel Terbaru</h2>
                    <p>Ikuti perkembangan, pengumuman, dan liputan kegiatan terbaru di SMA Negeri 1 Tanjungpinang.</p>
                </div>
                <a href="{{ route('news') }}" class="btn-primary" style="margin-bottom: 0.5rem;"><i class="fa-solid fa-list-check"></i> Semua Berita</a>
            </div>

            <!-- Category Filter Tabs -->
            <div class="filter-tabs">
                <button class="filter-tab active" data-filter="all">Semua</button>
                <button class="filter-tab" data-filter="utama">Utama</button>
                <button class="filter-tab" data-filter="umum">Umum</button>
                <button class="filter-tab" data-filter="pendidikan">Pendidikan</button>
                <button class="filter-tab" data-filter="iptek">IPTEK</button>
            </div>

            <!-- Blog Grid -->
            <div class="blog-grid">
                @forelse($articles as $article)
                    <article class="blog-card" data-category="{{ $article->category }}">
                        <div class="blog-img-box">
                            <img src="{{ $article->image }}" alt="{{ $article->title }}">
                            <span class="blog-tag">{{ $article->category }}</span>
                        </div>
                        <div class="blog-content">
                            <div class="blog-meta">
                                <span><i class="fa-solid fa-user"></i> {{ $article->author }}</span>
                                <span><i class="fa-solid fa-calendar-days"></i> {{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M Y') }}</span>
                            </div>
                            <h3 class="blog-title"><a href="#" class="blog-modal-trigger">{{ $article->title }}</a></h3>
                            <p class="blog-excerpt">{{ Str::limit(strip_tags($article->content), 120) }}</p>
                            <button class="blog-readmore blog-modal-trigger" style="background: none; border: none; padding: 0; cursor: pointer; text-align: left;">Selengkapnya <i class="fa-solid fa-arrow-right-long"></i></button>
                            
                            <!-- Hidden Full Content for Modal -->
                            <div class="hidden-full-article" style="display: none;">
                                <div class="full-title">{{ $article->title }}</div>
                                <div class="full-author">{{ $article->author }}</div>
                                <div class="full-date">{{ \Carbon\Carbon::parse($article->published_at)->translatedFormat('d M Y') }}</div>
                                <div class="full-category">{{ $article->category }}</div>
                                <div class="full-image">{{ $article->image }}</div>
                                <div class="full-body">{!! $article->content !!}</div>
                            </div>
                        </div>
                    </article>
                @empty
                    <div style="grid-column: span 3; text-align: center; padding: 3rem; color: var(--text-muted);">
                        <i class="fa-solid fa-newspaper" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                        <p>Belum ada berita atau artikel yang diterbitkan.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- School Activities Gallery Section -->
    <section id="prestasi" class="gallery-section">
        <div class="container">
            <div class="section-header" style="display: flex; justify-content: space-between; align-items: flex-end; flex-wrap: wrap; gap: 1rem; text-align: left;">
                <div>
                    <h2>Galeri SMANSA</h2>
                    <p>Dokumentasi visual rangkaian kegiatan belajar mengajar, sarana prasarana, ekstrakurikuler, dan prestasi siswa.</p>
                </div>
                <a href="{{ route('gallery') }}" class="btn-primary" style="margin-bottom: 0.5rem;"><i class="fa-solid fa-images"></i> Semua Galeri</a>
            </div>

            <div class="gallery-grid">
                @forelse($galleries as $gallery)
                    <div class="gallery-item" data-category="{{ $gallery->category }}">
                        <img src="{{ $gallery->image }}" alt="{{ $gallery->title }}">
                        <div class="gallery-overlay">
                            <span>{{ $gallery->category }}</span>
                            <h4>{{ $gallery->title }}</h4>
                        </div>
                    </div>
                @empty
                    <div style="grid-column: span 3; text-align: center; padding: 3rem; color: var(--text-muted);">
                        <i class="fa-solid fa-images" style="font-size: 3rem; margin-bottom: 1rem; opacity: 0.3;"></i>
                        <p>Belum ada foto galeri.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section>

    <!-- Interactive Contact Form Section -->
    <section id="kontak" class="contact-section">
        <div class="container">
            <div class="contact-grid">
                <!-- Contact Details -->
                <div class="contact-info">
                    <div>
                        <span class="text-gold" style="font-weight: 700; font-size: 0.9rem; text-transform: uppercase; letter-spacing: 1px;">Hubungi Kami</span>
                        <h3 style="margin-top: 0.25rem;">Ada Pertanyaan? Hubungi Humas Kami</h3>
                        <p style="color: var(--text-muted); margin-top: 0.5rem;">Kami siap memberikan informasi lengkap seputar penerimaan siswa baru, kurikulum, dan kemitraan sekolah.</p>
                    </div>

                    <div class="contact-card-box">
                        <!-- Card 1: Address -->
                        <div class="contact-item-card">
                            <div class="contact-icon">
                                <i class="fa-solid fa-map-location-dot"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Alamat Sekolah</h4>
                                <p>Jl. Dr. Sutomo, Tanjungpinang, Kepulauan Riau, 29100</p>
                            </div>
                        </div>

                        <!-- Card 2: Phone -->
                        <div class="contact-item-card">
                            <div class="contact-icon">
                                <i class="fa-solid fa-phone-volume"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Nomor Telepon</h4>
                                <p>+62-0771-21216 (Jam Kerja)</p>
                            </div>
                        </div>

                        <!-- Card 3: Email -->
                        <div class="contact-item-card">
                            <div class="contact-icon">
                                <i class="fa-solid fa-envelope-open-text"></i>
                            </div>
                            <div class="contact-details">
                                <h4>Alamat Surel</h4>
                                <p>info@smansa-tpi.sch.id</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form Card -->
                <div class="contact-form-card">
                    <h3 style="margin-bottom: 1.5rem; color: var(--primary-dark);">Kirim Pesan</h3>
                    
                    <!-- Alert Success Feedback -->
                    @if(Session::has('contact_success'))
                        <div class="alert alert-success">
                            <i class="fa-solid fa-circle-check"></i> {{ Session::get('contact_success') }}
                        </div>
                    @endif

                    <!-- Alert Error Feedback -->
                    @if(Session::has('contact_error') || $errors->any())
                        <div class="alert alert-danger">
                            <i class="fa-solid fa-circle-exclamation"></i> {{ Session::get('contact_error', 'Gagal mengirim pesan. Sila periksa kembali formulir.') }}
                        </div>
                    @endif

                    <form action="{{ route('contact.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="name">Nama Lengkap *</label>
                            <input type="text" id="name" name="name" class="form-control" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                            @error('name')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">Alamat Email *</label>
                            <input type="email" id="email" name="email" class="form-control" placeholder="Masukkan alamat email aktif" value="{{ old('email') }}" required>
                            @error('email')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="subject">Subjek Pesan *</label>
                            <input type="text" id="subject" name="subject" class="form-control" placeholder="Subjek pengajuan / pertanyaan" value="{{ old('subject') }}" required>
                            @error('subject')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group" style="margin-bottom: 2rem;">
                            <label for="message">Pesan / Pertanyaan Anda *</label>
                            <textarea id="message" name="message" rows="5" class="form-control" placeholder="Tuliskan pesan lengkap Anda disini..." required>{{ old('message') }}</textarea>
                            @error('message')
                                <span style="font-size: 0.8rem; color: #ef4444; font-weight: 500;">{{ $message }}</span>
                            @enderror
                        </div>

                        <button type="submit" class="btn-primary" style="width: 100%; justify-content: center;">
                            Kirim Pesan Sekarang <i class="fa-solid fa-paper-plane"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

@endsection
