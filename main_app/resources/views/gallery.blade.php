@extends('layouts.app')

@section('title', 'Galeri Dokumentasi Kegiatan – SMAN 1 Tanjungpinang')

@section('content')

    <!-- Hero Header -->
    <section class="profile-hero" style="background: linear-gradient(135deg, var(--primary-color) 0%, var(--primary-dark) 100%);">
        <div class="container">
            <h1>Galeri Dokumentasi SMANSA</h1>
            <div class="profile-breadcrumbs">
                <a href="{{ route('home') }}">Home</a>
                <i class="fa-solid fa-chevron-right" style="font-size: 0.75rem; opacity: 0.5;"></i>
                <span class="text-gold" style="font-weight: 700;">Galeri Sekolah</span>
            </div>
        </div>
    </section>

    <!-- Gallery Content Section -->
    <section class="container" style="padding: 5rem 2rem;">
        
        <!-- Category Filter Tabs -->
        <div class="filter-tabs" style="margin-bottom: 4rem;">
            <button class="filter-tab active" data-filter="all">Semua Foto</button>
            <button class="filter-tab" data-filter="kegiatan">Kegiatan</button>
            <button class="filter-tab" data-filter="fasilitas">Fasilitas</button>
            <button class="filter-tab" data-filter="osis">OSIS</button>
            <button class="filter-tab" data-filter="prestasi">Prestasi</button>
        </div>

        <!-- Gallery Grid -->
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
                <div style="grid-column: span 3; text-align: center; padding: 5rem; color: var(--text-muted);">
                    <i class="fa-solid fa-images" style="font-size: 4rem; margin-bottom: 1.5rem; opacity: 0.2;"></i>
                    <p style="font-size: 1.1rem;">Belum ada foto dokumentasi yang diunggah.</p>
                </div>
            @endforelse
        </div>

        <!-- Pagination Links -->
        <div class="pagination-wrapper" style="margin-top: 4rem; display: flex; justify-content: center;">
            {{ $galleries->links() }}
        </div>
        
    </section>

    <!-- Custom Client-Side Filter script for standalone pages to ensure the "kegiatan", "fasilitas" etc. tabs work beautifully! -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.gallery-section .filter-tab, .container .filter-tab');
            const items = document.querySelectorAll('.gallery-item');
            
            if (tabs.length > 0 && items.length > 0) {
                tabs.forEach(tab => {
                    tab.addEventListener('click', () => {
                        tabs.forEach(t => t.classList.remove('active'));
                        tab.classList.add('active');
                        
                        const filterValue = tab.getAttribute('data-filter');
                        
                        items.forEach(item => {
                            const itemCategory = item.getAttribute('data-category');
                            if (filterValue === 'all' || itemCategory === filterValue) {
                                item.style.display = 'block';
                                item.style.animation = 'fadeIn 0.5s ease forwards';
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    });
                });
            }
        });
    </script>

@endsection
