@extends('layouts.app')

@section('title', 'Sarana & Prasarana Sekolah – SMAN 1 Tanjungpinang')

@section('content')

    <!-- Hero Header -->
    <section class="profile-hero">
        <div class="container">
            <h1>Sarana & Prasarana</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Sarana Prasarana</span>
            </div>
        </div>
    </section>

    <!-- Facilities Content -->
    <section class="container" style="padding: 5rem 2rem;">
        <div style="max-width: 1000px; margin: 0 auto;">
            
            <div style="text-align: center; margin-bottom: 4rem;">
                <h2 style="font-size: 2.2rem; color: var(--primary-dark); margin-bottom: 1rem;">Fasilitas Penunjang Pendidikan SMANSA</h2>
                <p style="color: var(--text-muted); font-size: 1.1rem; max-width: 700px; margin: 0 auto;">Kami menyediakan fasilitas penunjang belajar yang komprehensif, modern, dan asri guna mendukung kenyamanan beraktivitas seluruh civitas akademika.</p>
            </div>

            <!-- Facilities Grid Layout -->
            <div style="display: grid; grid-template-columns: repeat(2, 1fr); gap: 2.5rem; margin-bottom: 4rem;">
                
                <!-- Facility 1 -->
                <div style="background-color: var(--bg-white); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); border: 1px solid rgba(4, 74, 39, 0.03); display: flex; flex-direction: column;">
                    <img src="https://picsum.photos/seed/lab-bio/500/300" alt="Laboratorium IPA SMANSA" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3 style="color: var(--primary-color); font-size: 1.3rem; margin-bottom: 0.75rem;">Laboratorium IPA (Fisika, Kimia, Biologi)</h3>
                        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6;">Tersedia laboratorium sains terpisah yang dilengkapi dengan peralatan praktikum lengkap, mikroskop digital, serta bahan eksperimen komprehensif untuk pengujian teori sains.</p>
                    </div>
                </div>

                <!-- Facility 2 -->
                <div style="background-color: var(--bg-white); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); border: 1px solid rgba(4, 74, 39, 0.03); display: flex; flex-direction: column;">
                    <img src="https://picsum.photos/seed/library-room/500/300" alt="e-Library Pustaka Digital SMANSA" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3 style="color: var(--primary-color); font-size: 1.3rem; margin-bottom: 0.75rem;">e-Library & Perpustakaan Fisik</h3>
                        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6;">Koleksi ribuan buku referensi pelajaran, ensiklopedia, novel sastra, serta katalog e-book digital yang dapat diakses siswa kapan saja secara mobile melalui aplikasi e-Library.</p>
                    </div>
                </div>

                <!-- Facility 3 -->
                <div style="background-color: var(--bg-white); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); border: 1px solid rgba(4, 74, 39, 0.03); display: flex; flex-direction: column;">
                    <img src="https://picsum.photos/seed/comp-center/500/300" alt="Laboratorium Komputer SMANSA" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3 style="color: var(--primary-color); font-size: 1.3rem; margin-bottom: 0.75rem;">Pusat Komputer & Akses Internet</h3>
                        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6;">Dua laboratorium komputer berpendingin udara (AC) yang masing-masing dilengkapi dengan 40 PC modern terkoneksi LAN/Wi-Fi untuk ujian berbasis CAT dan praktik pemrograman digital.</p>
                    </div>
                </div>

                <!-- Facility 4 -->
                <div style="background-color: var(--bg-white); border-radius: 20px; overflow: hidden; box-shadow: 0 10px 25px rgba(0, 0, 0, 0.02); border: 1px solid rgba(4, 74, 39, 0.03); display: flex; flex-direction: column;">
                    <img src="https://picsum.photos/seed/mosque/500/300" alt="Masjid Ulul Albab SMANSA" style="width: 100%; height: 200px; object-fit: cover;">
                    <div style="padding: 2rem;">
                        <h3 style="color: var(--primary-color); font-size: 1.3rem; margin-bottom: 0.75rem;">Masjid Ulul Albab</h3>
                        <p style="font-size: 0.95rem; color: var(--text-muted); line-height: 1.6;">Rumah ibadah yang luas dan asri di dalam kompleks sekolah. Digunakan untuk shalat berjamaah, pengajian keagamaan rutin, keputrian ramadhan, serta pengembangan akhlak islami siswa.</p>
                    </div>
                </div>

            </div>

            <!-- Accent Banner -->
            <div style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%); color: var(--text-light); padding: 3rem; border-radius: 24px; text-align: center; box-shadow: 0 10px 25px rgba(4, 74, 39, 0.2);">
                <h3 style="color: var(--accent-color); font-size: 1.6rem; margin-bottom: 0.5rem; font-family: var(--font-heading); font-weight: 700;">Sekolah Sehat & Asri (Adiwiyata)</h3>
                <p style="max-width: 700px; margin: 0 auto 2rem auto; opacity: 0.9; font-size: 1rem; line-height: 1.6;">SMA Negeri 1 Tanjungpinang menerapkan lingkungan sekolah hijau bebas plastik. Setiap ruang kelas dilengkapi pendingin ruangan (AC), LCD proyektor modern, serta fasilitas taman kelas yang rindang.</p>
                <a href="{{ route('home') }}#kontak" class="btn-accent">Ajukan Kunjungan Sekolah <i class="fa-solid fa-map"></i></a>
            </div>

        </div>
    </section>

@endsection
