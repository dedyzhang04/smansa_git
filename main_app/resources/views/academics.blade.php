@extends('layouts.app')

@section('title', 'Kurikulum Akademik & Kreatifitas – SMAN 1 Tanjungpinang')

@section('content')

    <!-- Hero Header -->
    <section class="profile-hero">
        <div class="container">
            <h1>Kurikulum & Akademik</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Akademik</span>
            </div>
        </div>
    </section>

    <!-- Academics Content -->
    <section class="container" style="padding: 5rem 2rem;">
        <div style="max-width: 900px; margin: 0 auto; background-color: var(--bg-white); padding: 4rem; border-radius: 24px; box-shadow: 0 10px 30px rgba(0, 0, 0, 0.02); border: 1px solid rgba(4, 74, 39, 0.03);">
            
            <h2 style="font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 1.5rem; position: relative; padding-bottom: 0.75rem;">
                Kurikulum Merdeka SMANSA
                <span style="display: block; width: 50px; height: 4px; background-color: var(--accent-color); position: absolute; bottom: 0; left: 0;"></span>
            </h2>
            
            <p style="font-size: 1.05rem; line-height: 1.75; color: #334155; margin-bottom: 1.5rem;">
                SMA Negeri 1 Tanjungpinang menerapkan **Kurikulum Merdeka** secara penuh untuk memfasilitasi kebutuhan minat dan bakat belajar masing-masing siswa. Kurikulum Merdeka menitikberatkan pada kebebasan siswa untuk memilih jalur peminatan mata pelajaran pendukung perguruan tinggi secara terarah, berfokus pada materi esensial, serta pengembangan karakter yang relevan dengan Profil Pelajar Pancasila.
            </p>

            <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 2.5rem 0 1rem 0;">1. Program Peminatan Akademis</h3>
            <p style="font-size: 1.05rem; line-height: 1.75; color: #334155; margin-bottom: 1rem;">
                Di kelas XI dan XII, siswa didorong untuk memilih paket kombinasi mata pelajaran pilihan sesuai dengan arah minat karir mereka:
            </p>
            <ul style="padding-left: 1.5rem; margin-bottom: 2rem;">
                <li style="margin-bottom: 0.75rem; font-size: 1.05rem;"><strong class="text-gold">Kelompok Sains (MIPA)</strong>: Berfokus pada Matematika Tingkat Lanjut, Fisika, Kimia, dan Biologi untuk persiapan studi Kedokteran, Teknik, Farmasi, Ilmu Komputer, dll.</li>
                <li style="margin-bottom: 0.75rem; font-size: 1.05rem;"><strong class="text-gold">Kelompok Sosial (IPS)</strong>: Berfokus pada Ekonomi Tingkat Lanjut, Sosiologi, Geografi, dan Sejarah Pilihan untuk persiapan karir Hukum, Akuntansi, Bisnis, Manajemen, Hubungan Internasional, dll.</li>
            </ul>

            <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 2.5rem 0 1rem 0;">2. Projek Penguatan Profil Pelajar Pancasila (P5)</h3>
            <p style="font-size: 1.05rem; line-height: 1.75; color: #334155; margin-bottom: 1rem;">
                Selain pembelajaran di kelas, siswa mengikuti projek kolaboratif lintas mata pelajaran bertema kebangsaan dan lingkungan hidup, seperti:
            </p>
            <ul style="padding-left: 1.5rem; margin-bottom: 2rem;">
                <li style="margin-bottom: 0.75rem; font-size: 1.05rem;"><strong>Gaya Hidup Berkelanjutan</strong>: Pengelolaan daur ulang sampah plastik, hidroponik sekolah, dan hemat energi.</li>
                <li style="margin-bottom: 0.75rem; font-size: 1.05rem;"><strong>Kearifan Lokal</strong>: Pelestarian kesenian dan budaya melayu Kepulauan Riau dalam bentuk bazar busana dan tari tradisi.</li>
                <li style="margin-bottom: 0.75rem; font-size: 1.05rem;"><strong>Suara Demokrasi</strong>: Simulasi Pemilu Raya Ketua OSIS dan MPK secara tertib dan transparan.</li>
            </ul>

            <h3 style="font-size: 1.5rem; color: var(--primary-color); margin: 2.5rem 0 1rem 0;">3. Program Kreatifitas Siswa (Ekstrakurikuler)</h3>
            <p style="font-size: 1.05rem; line-height: 1.75; color: #334155; margin-bottom: 1.5rem;">
                Kreativitas dan jiwa kepemimpinan siswa ditempa melalui 25 cabang kegiatan ekstrakurikuler di bawah naungan OSIS SMANSA, mencakup bidang sains, seni kesenian, bela negara, olahraga, dan kepramukaan.
            </p>
            
            <div style="text-align: center; margin-top: 3rem;">
                <a href="{{ route('home') }}#kontak" class="btn-accent">Konsultasi Akademik / PPDB <i class="fa-solid fa-circle-question"></i></a>
            </div>
            
        </div>
    </section>

@endsection
